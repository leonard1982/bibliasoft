
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
  scEventControl_data["codigoprod_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nompro_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idpro2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["costomen_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unimay_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["codigobar_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigobar_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigoprod_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigoprod_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nompro_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nompro_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["costomen_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["costomen_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unimay_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unimay_" + iSeqRow]["change"]) {
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
  if ("idpro1_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idpro1_" + iSeq == fieldName) {
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
  $('#id_sc_field_idprod_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_idprod__onchange(this, iSeqRow) });
  $('#id_sc_field_codigobar_' + iSeqRow).bind('blur', function() { sc_form_productos_editarproveedor_codigobar__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_productos_editarproveedor_codigobar__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_productos_editarproveedor_codigobar__onfocus(this, iSeqRow) });
  $('#id_sc_field_codigoprod_' + iSeqRow).bind('blur', function() { sc_form_productos_editarproveedor_codigoprod__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_productos_editarproveedor_codigoprod__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_productos_editarproveedor_codigoprod__onfocus(this, iSeqRow) });
  $('#id_sc_field_nompro_' + iSeqRow).bind('blur', function() { sc_form_productos_editarproveedor_nompro__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_productos_editarproveedor_nompro__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_editarproveedor_nompro__onfocus(this, iSeqRow) });
  $('#id_sc_field_unidmaymen_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_unidmaymen__onchange(this, iSeqRow) });
  $('#id_sc_field_unimay_' + iSeqRow).bind('blur', function() { sc_form_productos_editarproveedor_unimay__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_productos_editarproveedor_unimay__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_editarproveedor_unimay__onfocus(this, iSeqRow) });
  $('#id_sc_field_unimen_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_unimen__onchange(this, iSeqRow) });
  $('#id_sc_field_costomay_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_costomay__onchange(this, iSeqRow) });
  $('#id_sc_field_costomen_' + iSeqRow).bind('blur', function() { sc_form_productos_editarproveedor_costomen__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_productos_editarproveedor_costomen__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_productos_editarproveedor_costomen__onfocus(this, iSeqRow) });
  $('#id_sc_field_recmayamen_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_recmayamen__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_preciomen__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen2_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_preciomen2__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomen3_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_preciomen3__onchange(this, iSeqRow) });
  $('#id_sc_field_precio2_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_precio2__onchange(this, iSeqRow) });
  $('#id_sc_field_preciomay_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_preciomay__onchange(this, iSeqRow) });
  $('#id_sc_field_preciofull_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_preciofull__onchange(this, iSeqRow) });
  $('#id_sc_field_stockmay_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_stockmay__onchange(this, iSeqRow) });
  $('#id_sc_field_stockmen_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_stockmen__onchange(this, iSeqRow) });
  $('#id_sc_field_idgrup_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_idgrup__onchange(this, iSeqRow) });
  $('#id_sc_field_idpro1_' + iSeqRow).bind('blur', function() { sc_form_productos_editarproveedor_idpro1__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_productos_editarproveedor_idpro1__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_editarproveedor_idpro1__onfocus(this, iSeqRow) });
  $('#id_sc_field_idpro2_' + iSeqRow).bind('blur', function() { sc_form_productos_editarproveedor_idpro2__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_productos_editarproveedor_idpro2__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_productos_editarproveedor_idpro2__onfocus(this, iSeqRow) });
  $('#id_sc_field_idiva_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_idiva__onchange(this, iSeqRow) });
  $('#id_sc_field_otro_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_otro__onchange(this, iSeqRow) });
  $('#id_sc_field_otro2_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_otro2__onchange(this, iSeqRow) });
  $('#id_sc_field_colores_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_colores__onchange(this, iSeqRow) });
  $('#id_sc_field_tallas_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_tallas__onchange(this, iSeqRow) });
  $('#id_sc_field_sabores_' + iSeqRow).bind('change', function() { sc_form_productos_editarproveedor_sabores__onchange(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_productos_editarproveedor_idprod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_codigobar__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_editarproveedor_validate_codigobar_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_codigobar__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_editarproveedor_codigobar__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_codigoprod__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_editarproveedor_validate_codigoprod_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_codigoprod__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_editarproveedor_codigoprod__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_nompro__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_editarproveedor_validate_nompro_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_nompro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_editarproveedor_nompro__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_unidmaymen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_unimay__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_editarproveedor_validate_unimay_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_unimay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_editarproveedor_unimay__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_unimen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_costomay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_costomen__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_editarproveedor_validate_costomen_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_costomen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_editarproveedor_costomen__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_recmayamen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_preciomen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_preciomen2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_preciomen3__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_precio2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_preciomay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_preciofull__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_stockmay__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_stockmen__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_idgrup__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_idpro1__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_editarproveedor_validate_idpro1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_idpro1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_productos_editarproveedor_event_idpro1__onchange(iSeqRow);
  nm_check_insert(iSeqRow);
}

function sc_form_productos_editarproveedor_idpro1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_idpro2__onblur(oThis, iSeqRow) {
  do_ajax_form_productos_editarproveedor_validate_idpro2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_idpro2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_productos_editarproveedor_idpro2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_productos_editarproveedor_idiva__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_otro__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_otro2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_colores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_tallas__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_productos_editarproveedor_sabores__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("codigobar_", "", status);
	displayChange_field("codigoprod_", "", status);
	displayChange_field("nompro_", "", status);
	displayChange_field("idpro1_", "", status);
	displayChange_field("idpro2_", "", status);
	displayChange_field("costomen_", "", status);
	displayChange_field("unimay_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_codigobar_(row, status);
	displayChange_field_codigoprod_(row, status);
	displayChange_field_nompro_(row, status);
	displayChange_field_idpro1_(row, status);
	displayChange_field_idpro2_(row, status);
	displayChange_field_costomen_(row, status);
	displayChange_field_unimay_(row, status);
}

function displayChange_field(field, row, status) {
	if ("codigobar_" == field) {
		displayChange_field_codigobar_(row, status);
	}
	if ("codigoprod_" == field) {
		displayChange_field_codigoprod_(row, status);
	}
	if ("nompro_" == field) {
		displayChange_field_nompro_(row, status);
	}
	if ("idpro1_" == field) {
		displayChange_field_idpro1_(row, status);
	}
	if ("idpro2_" == field) {
		displayChange_field_idpro2_(row, status);
	}
	if ("costomen_" == field) {
		displayChange_field_costomen_(row, status);
	}
	if ("unimay_" == field) {
		displayChange_field_unimay_(row, status);
	}
}

function displayChange_field_codigobar_(row, status) {
}

function displayChange_field_codigoprod_(row, status) {
}

function displayChange_field_nompro_(row, status) {
}

function displayChange_field_idpro1_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idpro1___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idpro1_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idpro1_");
	}
}

function displayChange_field_idpro2_(row, status) {
}

function displayChange_field_costomen_(row, status) {
}

function displayChange_field_unimay_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_idpro1_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_productos_editarproveedor_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(38);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_productos_editarproveedor')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idpro1_" == specificField) {
    scJQSelect2Add_idpro1_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_idpro1_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idpro1__obj" : "#id_sc_field_idpro1_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idpro1__obj',
      dropdownCssClass: 'css_idpro1__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_idpro1_) { displayChange_field_idpro1_(iLine, "on"); } }, 150);
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

