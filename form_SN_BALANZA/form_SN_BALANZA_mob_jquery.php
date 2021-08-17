
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
  scEventControl_data["sn_puerto_com" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_baudios" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_paridad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_bits" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_copy_inicio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_copy_fin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_peso" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_intervalo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_parametro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_divisor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sn_modo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["sn_puerto_com" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_puerto_com" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_baudios" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_baudios" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_paridad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_paridad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_bits" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_bits" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_copy_inicio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_copy_inicio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_copy_fin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_copy_fin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_peso" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_peso" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_intervalo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_intervalo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_parametro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_parametro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_divisor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_divisor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sn_modo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sn_modo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("sn_puerto_com" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sn_modo" + iSeq == fieldName) {
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
  $('#id_sc_field_sn_puerto_com' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_puerto_com_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_SN_BALANZA_sn_puerto_com_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_baudios' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_baudios_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_SN_BALANZA_sn_baudios_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_paridad' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_paridad_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_SN_BALANZA_sn_paridad_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_bits' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_bits_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_SN_BALANZA_sn_bits_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_copy_inicio' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_copy_inicio_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_SN_BALANZA_sn_copy_inicio_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_copy_fin' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_copy_fin_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_SN_BALANZA_sn_copy_fin_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_peso' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_peso_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_SN_BALANZA_sn_peso_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_intervalo' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_intervalo_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_SN_BALANZA_sn_intervalo_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_parametro' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_parametro_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_SN_BALANZA_sn_parametro_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_divisor' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_divisor_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_SN_BALANZA_sn_divisor_onfocus(this, iSeqRow) });
  $('#id_sc_field_sn_modo' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_sn_modo_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_SN_BALANZA_sn_modo_onfocus(this, iSeqRow) });
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_SN_BALANZA_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_SN_BALANZA_id_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_SN_BALANZA_sn_puerto_com_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_puerto_com();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_puerto_com_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_baudios_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_baudios();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_baudios_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_paridad_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_paridad();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_paridad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_bits_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_bits();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_bits_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_copy_inicio_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_copy_inicio();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_copy_inicio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_copy_fin_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_copy_fin();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_copy_fin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_peso_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_peso();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_peso_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_intervalo_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_intervalo();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_intervalo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_parametro_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_parametro();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_parametro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_divisor_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_divisor();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_divisor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_sn_modo_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_sn_modo();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_sn_modo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_SN_BALANZA_id_onblur(oThis, iSeqRow) {
  do_ajax_form_SN_BALANZA_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_SN_BALANZA_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("sn_puerto_com", "", status);
	displayChange_field("sn_baudios", "", status);
	displayChange_field("sn_paridad", "", status);
	displayChange_field("sn_bits", "", status);
	displayChange_field("sn_copy_inicio", "", status);
	displayChange_field("sn_copy_fin", "", status);
	displayChange_field("sn_peso", "", status);
	displayChange_field("sn_intervalo", "", status);
	displayChange_field("sn_parametro", "", status);
	displayChange_field("sn_divisor", "", status);
	displayChange_field("sn_modo", "", status);
	displayChange_field("id", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_sn_puerto_com(row, status);
	displayChange_field_sn_baudios(row, status);
	displayChange_field_sn_paridad(row, status);
	displayChange_field_sn_bits(row, status);
	displayChange_field_sn_copy_inicio(row, status);
	displayChange_field_sn_copy_fin(row, status);
	displayChange_field_sn_peso(row, status);
	displayChange_field_sn_intervalo(row, status);
	displayChange_field_sn_parametro(row, status);
	displayChange_field_sn_divisor(row, status);
	displayChange_field_sn_modo(row, status);
	displayChange_field_id(row, status);
}

function displayChange_field(field, row, status) {
	if ("sn_puerto_com" == field) {
		displayChange_field_sn_puerto_com(row, status);
	}
	if ("sn_baudios" == field) {
		displayChange_field_sn_baudios(row, status);
	}
	if ("sn_paridad" == field) {
		displayChange_field_sn_paridad(row, status);
	}
	if ("sn_bits" == field) {
		displayChange_field_sn_bits(row, status);
	}
	if ("sn_copy_inicio" == field) {
		displayChange_field_sn_copy_inicio(row, status);
	}
	if ("sn_copy_fin" == field) {
		displayChange_field_sn_copy_fin(row, status);
	}
	if ("sn_peso" == field) {
		displayChange_field_sn_peso(row, status);
	}
	if ("sn_intervalo" == field) {
		displayChange_field_sn_intervalo(row, status);
	}
	if ("sn_parametro" == field) {
		displayChange_field_sn_parametro(row, status);
	}
	if ("sn_divisor" == field) {
		displayChange_field_sn_divisor(row, status);
	}
	if ("sn_modo" == field) {
		displayChange_field_sn_modo(row, status);
	}
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
}

function displayChange_field_sn_puerto_com(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sn_puerto_com__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sn_puerto_com" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sn_puerto_com");
	}
}

function displayChange_field_sn_baudios(row, status) {
}

function displayChange_field_sn_paridad(row, status) {
}

function displayChange_field_sn_bits(row, status) {
}

function displayChange_field_sn_copy_inicio(row, status) {
}

function displayChange_field_sn_copy_fin(row, status) {
}

function displayChange_field_sn_peso(row, status) {
}

function displayChange_field_sn_intervalo(row, status) {
}

function displayChange_field_sn_parametro(row, status) {
}

function displayChange_field_sn_divisor(row, status) {
}

function displayChange_field_sn_modo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sn_modo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sn_modo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sn_modo");
	}
}

function displayChange_field_id(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_sn_puerto_com("all", "on");
	displayChange_field_sn_modo("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_SN_BALANZA_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_SN_BALANZA_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "sn_puerto_com" == specificField) {
    scJQSelect2Add_sn_puerto_com(seqRow);
  }
  if (null == specificField || "sn_modo" == specificField) {
    scJQSelect2Add_sn_modo(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_sn_puerto_com(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sn_puerto_com_obj" : "#id_sc_field_sn_puerto_com" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sn_puerto_com_obj',
      dropdownCssClass: 'css_sn_puerto_com_obj',
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

function scJQSelect2Add_sn_modo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sn_modo_obj" : "#id_sc_field_sn_modo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sn_modo_obj',
      dropdownCssClass: 'css_sn_modo_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_sn_puerto_com) { displayChange_field_sn_puerto_com(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sn_modo) { displayChange_field_sn_modo(iLine, "on"); } }, 150);
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
