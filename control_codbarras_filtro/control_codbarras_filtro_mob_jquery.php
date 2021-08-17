
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
  scEventControl_data["familia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tamanio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoletra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["numerocolumnas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipocodbarras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipoimagen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["altura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["vercodigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["verdescripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["verprecio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["titulopersonalizado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["familia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["familia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tamanio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tamanio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoletra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoletra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["numerocolumnas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numerocolumnas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipocodbarras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipocodbarras" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipoimagen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipoimagen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["altura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["altura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vercodigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vercodigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["verdescripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["verdescripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["verprecio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["verprecio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["titulopersonalizado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["titulopersonalizado" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("familia" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipoletra" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipocodbarras" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipoimagen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("verprecio" + iSeq == fieldName) {
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
  $('#id_sc_field_familia' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_familia_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_codbarras_filtro_familia_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_codigo_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_codbarras_filtro_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_descripcion_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_control_codbarras_filtro_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_tamanio' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_tamanio_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_control_codbarras_filtro_tamanio_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoletra' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_tipoletra_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_codbarras_filtro_tipoletra_onfocus(this, iSeqRow) });
  $('#id_sc_field_numerocolumnas' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_numerocolumnas_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_codbarras_filtro_numerocolumnas_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipocodbarras' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_tipocodbarras_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_control_codbarras_filtro_tipocodbarras_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipoimagen' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_tipoimagen_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_control_codbarras_filtro_tipoimagen_onfocus(this, iSeqRow) });
  $('#id_sc_field_titulopersonalizado' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_titulopersonalizado_onblur(this, iSeqRow) })
                                                 .bind('focus', function() { sc_control_codbarras_filtro_titulopersonalizado_onfocus(this, iSeqRow) });
  $('#id_sc_field_vercodigo' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_vercodigo_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_codbarras_filtro_vercodigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_verdescripcion' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_verdescripcion_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_control_codbarras_filtro_verdescripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_verprecio' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_verprecio_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_control_codbarras_filtro_verprecio_onfocus(this, iSeqRow) });
  $('#id_sc_field_altura' + iSeqRow).bind('blur', function() { sc_control_codbarras_filtro_altura_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_control_codbarras_filtro_altura_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-vercodigo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-verdescripcion' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_control_codbarras_filtro_familia_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_familia();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_familia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_codigo_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_codigo();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_descripcion();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_tamanio_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_tamanio();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_tamanio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_tipoletra_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_tipoletra();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_tipoletra_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_numerocolumnas_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_numerocolumnas();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_numerocolumnas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_tipocodbarras_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_tipocodbarras();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_tipocodbarras_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_tipoimagen_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_tipoimagen();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_tipoimagen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_titulopersonalizado_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_titulopersonalizado();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_titulopersonalizado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_vercodigo_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_vercodigo();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_vercodigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_verdescripcion_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_verdescripcion();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_verdescripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_verprecio_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_verprecio();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_verprecio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_control_codbarras_filtro_altura_onblur(oThis, iSeqRow) {
  do_ajax_control_codbarras_filtro_mob_validate_altura();
  scCssBlur(oThis);
}

function sc_control_codbarras_filtro_altura_onfocus(oThis, iSeqRow) {
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
	displayChange_field("familia", "", status);
	displayChange_field("codigo", "", status);
	displayChange_field("descripcion", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("tamanio", "", status);
	displayChange_field("tipoletra", "", status);
	displayChange_field("numerocolumnas", "", status);
	displayChange_field("tipocodbarras", "", status);
	displayChange_field("tipoimagen", "", status);
	displayChange_field("altura", "", status);
	displayChange_field("vercodigo", "", status);
	displayChange_field("verdescripcion", "", status);
	displayChange_field("verprecio", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("titulopersonalizado", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_familia(row, status);
	displayChange_field_codigo(row, status);
	displayChange_field_descripcion(row, status);
	displayChange_field_tamanio(row, status);
	displayChange_field_tipoletra(row, status);
	displayChange_field_numerocolumnas(row, status);
	displayChange_field_tipocodbarras(row, status);
	displayChange_field_tipoimagen(row, status);
	displayChange_field_altura(row, status);
	displayChange_field_vercodigo(row, status);
	displayChange_field_verdescripcion(row, status);
	displayChange_field_verprecio(row, status);
	displayChange_field_titulopersonalizado(row, status);
}

function displayChange_field(field, row, status) {
	if ("familia" == field) {
		displayChange_field_familia(row, status);
	}
	if ("codigo" == field) {
		displayChange_field_codigo(row, status);
	}
	if ("descripcion" == field) {
		displayChange_field_descripcion(row, status);
	}
	if ("tamanio" == field) {
		displayChange_field_tamanio(row, status);
	}
	if ("tipoletra" == field) {
		displayChange_field_tipoletra(row, status);
	}
	if ("numerocolumnas" == field) {
		displayChange_field_numerocolumnas(row, status);
	}
	if ("tipocodbarras" == field) {
		displayChange_field_tipocodbarras(row, status);
	}
	if ("tipoimagen" == field) {
		displayChange_field_tipoimagen(row, status);
	}
	if ("altura" == field) {
		displayChange_field_altura(row, status);
	}
	if ("vercodigo" == field) {
		displayChange_field_vercodigo(row, status);
	}
	if ("verdescripcion" == field) {
		displayChange_field_verdescripcion(row, status);
	}
	if ("verprecio" == field) {
		displayChange_field_verprecio(row, status);
	}
	if ("titulopersonalizado" == field) {
		displayChange_field_titulopersonalizado(row, status);
	}
}

function displayChange_field_familia(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_familia__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_familia" + row).select2("destroy");
		}
		scJQSelect2Add(row, "familia");
	}
}

function displayChange_field_codigo(row, status) {
}

function displayChange_field_descripcion(row, status) {
}

function displayChange_field_tamanio(row, status) {
}

function displayChange_field_tipoletra(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipoletra__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipoletra" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipoletra");
	}
}

function displayChange_field_numerocolumnas(row, status) {
}

function displayChange_field_tipocodbarras(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipocodbarras__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipocodbarras" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipocodbarras");
	}
}

function displayChange_field_tipoimagen(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipoimagen__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipoimagen" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipoimagen");
	}
}

function displayChange_field_altura(row, status) {
}

function displayChange_field_vercodigo(row, status) {
}

function displayChange_field_verdescripcion(row, status) {
}

function displayChange_field_verprecio(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_verprecio__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_verprecio" + row).select2("destroy");
		}
		scJQSelect2Add(row, "verprecio");
	}
}

function displayChange_field_titulopersonalizado(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_familia("all", "on");
	displayChange_field_tipoletra("all", "on");
	displayChange_field_tipocodbarras("all", "on");
	displayChange_field_tipoimagen("all", "on");
	displayChange_field_verprecio("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_control_codbarras_filtro_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(36);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'control_codbarras_filtro_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "familia" == specificField) {
    scJQSelect2Add_familia(seqRow);
  }
  if (null == specificField || "tipoletra" == specificField) {
    scJQSelect2Add_tipoletra(seqRow);
  }
  if (null == specificField || "tipocodbarras" == specificField) {
    scJQSelect2Add_tipocodbarras(seqRow);
  }
  if (null == specificField || "tipoimagen" == specificField) {
    scJQSelect2Add_tipoimagen(seqRow);
  }
  if (null == specificField || "verprecio" == specificField) {
    scJQSelect2Add_verprecio(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_familia(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_familia_obj" : "#id_sc_field_familia" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_familia_obj',
      dropdownCssClass: 'css_familia_obj',
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

function scJQSelect2Add_tipoletra(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipoletra_obj" : "#id_sc_field_tipoletra" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipoletra_obj',
      dropdownCssClass: 'css_tipoletra_obj',
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

function scJQSelect2Add_tipocodbarras(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipocodbarras_obj" : "#id_sc_field_tipocodbarras" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipocodbarras_obj',
      dropdownCssClass: 'css_tipocodbarras_obj',
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

function scJQSelect2Add_tipoimagen(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipoimagen_obj" : "#id_sc_field_tipoimagen" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipoimagen_obj',
      dropdownCssClass: 'css_tipoimagen_obj',
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

function scJQSelect2Add_verprecio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_verprecio_obj" : "#id_sc_field_verprecio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_verprecio_obj',
      dropdownCssClass: 'css_verprecio_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_familia) { displayChange_field_familia(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipoletra) { displayChange_field_tipoletra(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipocodbarras) { displayChange_field_tipocodbarras(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipoimagen) { displayChange_field_tipoimagen(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_verprecio) { displayChange_field_verprecio(iLine, "on"); } }, 150);
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

