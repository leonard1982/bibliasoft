
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
  scEventControl_data["productos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["terceros" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ventas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["compras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["copias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cobros" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["notas_credito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contratos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["agenda" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["indices" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["inventario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["documentos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ventas_usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["productos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["productos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["terceros" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["terceros" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ventas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ventas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["compras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["compras" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["copias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["copias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cobros" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cobros" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["notas_credito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["notas_credito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contratos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contratos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["agenda" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["agenda" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["indices" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["indices" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["inventario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["inventario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documentos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documentos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ventas_usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ventas_usuario" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
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
  $('#id_sc_field_productos' + iSeqRow).bind('blur', function() { sc_control_menu_productos_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_menu_productos_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_menu_productos_onfocus(this, iSeqRow) });
  $('#id_sc_field_terceros' + iSeqRow).bind('blur', function() { sc_control_menu_terceros_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_control_menu_terceros_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_control_menu_terceros_onfocus(this, iSeqRow) });
  $('#id_sc_field_ventas' + iSeqRow).bind('blur', function() { sc_control_menu_ventas_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_control_menu_ventas_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_menu_ventas_onfocus(this, iSeqRow) });
  $('#id_sc_field_compras' + iSeqRow).bind('blur', function() { sc_control_menu_compras_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_control_menu_compras_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_menu_compras_onfocus(this, iSeqRow) });
  $('#id_sc_field_copias' + iSeqRow).bind('blur', function() { sc_control_menu_copias_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_control_menu_copias_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_menu_copias_onfocus(this, iSeqRow) });
  $('#id_sc_field_empresa' + iSeqRow).bind('blur', function() { sc_control_menu_empresa_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_control_menu_empresa_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_menu_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagos' + iSeqRow).bind('blur', function() { sc_control_menu_pagos_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_control_menu_pagos_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_control_menu_pagos_onfocus(this, iSeqRow) });
  $('#id_sc_field_cobros' + iSeqRow).bind('blur', function() { sc_control_menu_cobros_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_control_menu_cobros_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_menu_cobros_onfocus(this, iSeqRow) });
  $('#id_sc_field_notas_credito' + iSeqRow).bind('blur', function() { sc_control_menu_notas_credito_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_control_menu_notas_credito_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_control_menu_notas_credito_onfocus(this, iSeqRow) });
  $('#id_sc_field_contratos' + iSeqRow).bind('blur', function() { sc_control_menu_contratos_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_control_menu_contratos_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_menu_contratos_onfocus(this, iSeqRow) });
  $('#id_sc_field_agenda' + iSeqRow).bind('blur', function() { sc_control_menu_agenda_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_control_menu_agenda_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_menu_agenda_onfocus(this, iSeqRow) });
  $('#id_sc_field_indices' + iSeqRow).bind('blur', function() { sc_control_menu_indices_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_control_menu_indices_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_menu_indices_onfocus(this, iSeqRow) });
  $('#id_sc_field_inventario' + iSeqRow).bind('blur', function() { sc_control_menu_inventario_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_control_menu_inventario_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_menu_inventario_onfocus(this, iSeqRow) });
  $('#id_sc_field_documentos' + iSeqRow).bind('blur', function() { sc_control_menu_documentos_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_control_menu_documentos_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_menu_documentos_onfocus(this, iSeqRow) });
  $('#id_sc_field_ventas_usuario' + iSeqRow).bind('blur', function() { sc_control_menu_ventas_usuario_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_control_menu_ventas_usuario_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_menu_ventas_usuario_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_control_menu_productos_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_productos();
  scCssBlur(oThis);
}

function sc_control_menu_productos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_productos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_terceros_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_terceros();
  scCssBlur(oThis);
}

function sc_control_menu_terceros_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_terceros_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_ventas_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_ventas();
  scCssBlur(oThis);
}

function sc_control_menu_ventas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_ventas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_compras_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_compras();
  scCssBlur(oThis);
}

function sc_control_menu_compras_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_compras_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_copias_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_copias();
  scCssBlur(oThis);
}

function sc_control_menu_copias_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_copias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_empresa_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_empresa();
  scCssBlur(oThis);
}

function sc_control_menu_empresa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_pagos_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_pagos();
  scCssBlur(oThis);
}

function sc_control_menu_pagos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_pagos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_cobros_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_cobros();
  scCssBlur(oThis);
}

function sc_control_menu_cobros_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_cobros_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_notas_credito_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_notas_credito();
  scCssBlur(oThis);
}

function sc_control_menu_notas_credito_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_notas_credito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_contratos_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_contratos();
  scCssBlur(oThis);
}

function sc_control_menu_contratos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_contratos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_agenda_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_agenda();
  scCssBlur(oThis);
}

function sc_control_menu_agenda_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_agenda_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_indices_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_indices();
  scCssBlur(oThis);
}

function sc_control_menu_indices_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_indices_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_inventario_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_inventario();
  scCssBlur(oThis);
}

function sc_control_menu_inventario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_inventario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_documentos_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_documentos();
  scCssBlur(oThis);
}

function sc_control_menu_documentos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_documentos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_menu_ventas_usuario_onblur(oThis, iSeqRow) {
  do_ajax_control_menu_validate_ventas_usuario();
  scCssBlur(oThis);
}

function sc_control_menu_ventas_usuario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_control_menu_ventas_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("productos", "", status);
	displayChange_field("terceros", "", status);
	displayChange_field("ventas", "", status);
	displayChange_field("compras", "", status);
	displayChange_field("copias", "", status);
	displayChange_field("empresa", "", status);
	displayChange_field("pagos", "", status);
	displayChange_field("cobros", "", status);
	displayChange_field("notas_credito", "", status);
	displayChange_field("contratos", "", status);
	displayChange_field("agenda", "", status);
	displayChange_field("indices", "", status);
	displayChange_field("inventario", "", status);
	displayChange_field("documentos", "", status);
	displayChange_field("ventas_usuario", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_productos(row, status);
	displayChange_field_terceros(row, status);
	displayChange_field_ventas(row, status);
	displayChange_field_compras(row, status);
	displayChange_field_copias(row, status);
	displayChange_field_empresa(row, status);
	displayChange_field_pagos(row, status);
	displayChange_field_cobros(row, status);
	displayChange_field_notas_credito(row, status);
	displayChange_field_contratos(row, status);
	displayChange_field_agenda(row, status);
	displayChange_field_indices(row, status);
	displayChange_field_inventario(row, status);
	displayChange_field_documentos(row, status);
	displayChange_field_ventas_usuario(row, status);
}

function displayChange_field(field, row, status) {
	if ("productos" == field) {
		displayChange_field_productos(row, status);
	}
	if ("terceros" == field) {
		displayChange_field_terceros(row, status);
	}
	if ("ventas" == field) {
		displayChange_field_ventas(row, status);
	}
	if ("compras" == field) {
		displayChange_field_compras(row, status);
	}
	if ("copias" == field) {
		displayChange_field_copias(row, status);
	}
	if ("empresa" == field) {
		displayChange_field_empresa(row, status);
	}
	if ("pagos" == field) {
		displayChange_field_pagos(row, status);
	}
	if ("cobros" == field) {
		displayChange_field_cobros(row, status);
	}
	if ("notas_credito" == field) {
		displayChange_field_notas_credito(row, status);
	}
	if ("contratos" == field) {
		displayChange_field_contratos(row, status);
	}
	if ("agenda" == field) {
		displayChange_field_agenda(row, status);
	}
	if ("indices" == field) {
		displayChange_field_indices(row, status);
	}
	if ("inventario" == field) {
		displayChange_field_inventario(row, status);
	}
	if ("documentos" == field) {
		displayChange_field_documentos(row, status);
	}
	if ("ventas_usuario" == field) {
		displayChange_field_ventas_usuario(row, status);
	}
}

function displayChange_field_productos(row, status) {
}

function displayChange_field_terceros(row, status) {
}

function displayChange_field_ventas(row, status) {
}

function displayChange_field_compras(row, status) {
}

function displayChange_field_copias(row, status) {
}

function displayChange_field_empresa(row, status) {
}

function displayChange_field_pagos(row, status) {
}

function displayChange_field_cobros(row, status) {
}

function displayChange_field_notas_credito(row, status) {
}

function displayChange_field_contratos(row, status) {
}

function displayChange_field_agenda(row, status) {
}

function displayChange_field_indices(row, status) {
}

function displayChange_field_inventario(row, status) {
}

function displayChange_field_documentos(row, status) {
}

function displayChange_field_ventas_usuario(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_control_menu_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(20);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'control_menu')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
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

