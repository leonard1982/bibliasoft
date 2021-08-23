
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
  scEventControl_data["id_cloud_tercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_departamento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_municipio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_postal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_regimen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_tributario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["responsabilidades_fiscales" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_pais" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cod_lenguaje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_cloud_tercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_cloud_tercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_departamento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_departamento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_municipio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_municipio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_postal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_postal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_regimen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_regimen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_tributario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_tributario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["responsabilidades_fiscales" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["responsabilidades_fiscales" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_pais" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_pais" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cod_lenguaje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cod_lenguaje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["nombres" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("cod_departamento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_municipio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_regimen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("detalle_tributario" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("responsabilidades_fiscales" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_tipo_establecimiento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_persona" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("cod_departamento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cod_municipio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nombres" + iSeq == fieldName) {
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
  $('#id_sc_field_id_cloud_tercero' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_id_cloud_tercero_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_cloud_terceros_id_cloud_tercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_documento' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_documento_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_terceros_documento_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_terceros_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombres' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_nombres_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cloud_terceros_nombres_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cloud_terceros_nombres_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_id_empresa_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_terceros_id_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_pais' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_cod_pais_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_cloud_terceros_cod_pais_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_departamento' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_cod_departamento_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_cloud_terceros_cod_departamento_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_cloud_terceros_cod_departamento_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_municipio' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_cod_municipio_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_terceros_cod_municipio_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_terceros_cod_municipio_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_postal' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_cod_postal_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_terceros_cod_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_lenguaje' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_cod_lenguaje_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cloud_terceros_cod_lenguaje_onfocus(this, iSeqRow) });
  $('#id_sc_field_cod_regimen' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_cod_regimen_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cloud_terceros_cod_regimen_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_tributario' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_detalle_tributario_onblur(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_cloud_terceros_detalle_tributario_onfocus(this, iSeqRow) });
  $('#id_sc_field_responsabilidades_fiscales' + iSeqRow).bind('blur', function() { sc_form_cloud_terceros_responsabilidades_fiscales_onblur(this, iSeqRow) })
                                                        .bind('focus', function() { sc_form_cloud_terceros_responsabilidades_fiscales_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_cloud_terceros_id_cloud_tercero_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_id_cloud_tercero();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_id_cloud_tercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_documento_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_documento();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_documento_onchange(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_event_documento_onchange();
}

function sc_form_cloud_terceros_documento_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_nombres_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_nombres();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_nombres_onchange(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_event_nombres_onchange();
}

function sc_form_cloud_terceros_nombres_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_id_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_id_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_cod_pais_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_cod_pais();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_cod_pais_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_cod_departamento_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_cod_departamento();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_cod_departamento_onchange(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_event_cod_departamento_onchange();
}

function sc_form_cloud_terceros_cod_departamento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_cod_municipio_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_cod_municipio();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_cod_municipio_onchange(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_event_cod_municipio_onchange();
}

function sc_form_cloud_terceros_cod_municipio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_cod_postal_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_cod_postal();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_cod_postal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_cod_lenguaje_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_cod_lenguaje();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_cod_lenguaje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_cod_regimen_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_cod_regimen();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_cod_regimen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_detalle_tributario_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_detalle_tributario();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_detalle_tributario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_terceros_responsabilidades_fiscales_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_terceros_mob_validate_responsabilidades_fiscales();
  scCssBlur(oThis);
}

function sc_form_cloud_terceros_responsabilidades_fiscales_onfocus(oThis, iSeqRow) {
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
	displayChange_field("id_cloud_tercero", "", status);
	displayChange_field("documento", "", status);
	displayChange_field("nombres", "", status);
	displayChange_field("id_empresa", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("cod_departamento", "", status);
	displayChange_field("cod_municipio", "", status);
	displayChange_field("cod_postal", "", status);
	displayChange_field("cod_regimen", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("detalle_tributario", "", status);
	displayChange_field("responsabilidades_fiscales", "", status);
	displayChange_field("cod_pais", "", status);
	displayChange_field("cod_lenguaje", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_cloud_tercero(row, status);
	displayChange_field_documento(row, status);
	displayChange_field_nombres(row, status);
	displayChange_field_id_empresa(row, status);
	displayChange_field_cod_departamento(row, status);
	displayChange_field_cod_municipio(row, status);
	displayChange_field_cod_postal(row, status);
	displayChange_field_cod_regimen(row, status);
	displayChange_field_detalle_tributario(row, status);
	displayChange_field_responsabilidades_fiscales(row, status);
	displayChange_field_cod_pais(row, status);
	displayChange_field_cod_lenguaje(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_cloud_tercero" == field) {
		displayChange_field_id_cloud_tercero(row, status);
	}
	if ("documento" == field) {
		displayChange_field_documento(row, status);
	}
	if ("nombres" == field) {
		displayChange_field_nombres(row, status);
	}
	if ("id_empresa" == field) {
		displayChange_field_id_empresa(row, status);
	}
	if ("cod_departamento" == field) {
		displayChange_field_cod_departamento(row, status);
	}
	if ("cod_municipio" == field) {
		displayChange_field_cod_municipio(row, status);
	}
	if ("cod_postal" == field) {
		displayChange_field_cod_postal(row, status);
	}
	if ("cod_regimen" == field) {
		displayChange_field_cod_regimen(row, status);
	}
	if ("detalle_tributario" == field) {
		displayChange_field_detalle_tributario(row, status);
	}
	if ("responsabilidades_fiscales" == field) {
		displayChange_field_responsabilidades_fiscales(row, status);
	}
	if ("cod_pais" == field) {
		displayChange_field_cod_pais(row, status);
	}
	if ("cod_lenguaje" == field) {
		displayChange_field_cod_lenguaje(row, status);
	}
}

function displayChange_field_id_cloud_tercero(row, status) {
}

function displayChange_field_documento(row, status) {
}

function displayChange_field_nombres(row, status) {
}

function displayChange_field_id_empresa(row, status) {
}

function displayChange_field_cod_departamento(row, status) {
}

function displayChange_field_cod_municipio(row, status) {
}

function displayChange_field_cod_postal(row, status) {
}

function displayChange_field_cod_regimen(row, status) {
}

function displayChange_field_detalle_tributario(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_detalle_tributario__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_detalle_tributario" + row).select2("destroy");
		}
		scJQSelect2Add(row, "detalle_tributario");
	}
}

function displayChange_field_responsabilidades_fiscales(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_responsabilidades_fiscales__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_responsabilidades_fiscales" + row).select2("destroy");
		}
		scJQSelect2Add(row, "responsabilidades_fiscales");
	}
}

function displayChange_field_cod_pais(row, status) {
}

function displayChange_field_cod_lenguaje(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_detalle_tributario("all", "on");
	displayChange_field_responsabilidades_fiscales("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_cloud_terceros_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
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
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_cloud_terceros_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
});function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "detalle_tributario" == specificField) {
    scJQSelect2Add_detalle_tributario(seqRow);
  }
  if (null == specificField || "responsabilidades_fiscales" == specificField) {
    scJQSelect2Add_responsabilidades_fiscales(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_detalle_tributario(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_detalle_tributario_obj" : "#id_sc_field_detalle_tributario" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_detalle_tributario_obj',
      dropdownCssClass: 'css_detalle_tributario_obj',
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

function scJQSelect2Add_responsabilidades_fiscales(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_responsabilidades_fiscales_obj" : "#id_sc_field_responsabilidades_fiscales" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_responsabilidades_fiscales_obj',
      dropdownCssClass: 'css_responsabilidades_fiscales_obj',
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
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_detalle_tributario) { displayChange_field_detalle_tributario(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_responsabilidades_fiscales) { displayChange_field_responsabilidades_fiscales(iLine, "on"); } }, 150);
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
