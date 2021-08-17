
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
  scEventControl_data["producto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stock" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tdescuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sidescuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subtotal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ahorro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["producto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["producto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stock" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stock" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tdescuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tdescuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sidescuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sidescuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subtotal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subtotal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ahorro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ahorro" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("producto" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("producto" + iSeq == fieldName) {
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
  $('#id_sc_field_producto' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_producto_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_seleccionarproducto_producto_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_seleccionarproducto_producto_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_cantidad_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_seleccionarproducto_cantidad_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_seleccionarproducto_cantidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_precio_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_seleccionarproducto_precio_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_seleccionarproducto_precio_onfocus(this, iSeqRow) });
  $('#id_sc_field_stock' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_stock_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_seleccionarproducto_stock_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_seleccionarproducto_stock_onfocus(this, iSeqRow) });
  $('#id_sc_field_factura' + iSeqRow).bind('change', function() { sc_seleccionarproducto_factura_onchange(this, iSeqRow) });
  $('#id_sc_field_iva' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_iva_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_seleccionarproducto_iva_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_seleccionarproducto_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_descuento_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_seleccionarproducto_descuento_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_seleccionarproducto_descuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_sidescuento' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_sidescuento_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_seleccionarproducto_sidescuento_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_seleccionarproducto_sidescuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_tdescuento' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_tdescuento_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_seleccionarproducto_tdescuento_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_seleccionarproducto_tdescuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_tiva' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_tiva_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_seleccionarproducto_tiva_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_seleccionarproducto_tiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_subtotal' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_subtotal_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_seleccionarproducto_subtotal_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_seleccionarproducto_subtotal_onfocus(this, iSeqRow) });
  $('#id_sc_field_ahorro' + iSeqRow).bind('blur', function() { sc_seleccionarproducto_ahorro_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_seleccionarproducto_ahorro_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_seleccionarproducto_ahorro_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_seleccionarproducto_producto_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_producto();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_producto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_seleccionarproducto_event_producto_onchange();
}

function sc_seleccionarproducto_producto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_cantidad_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_cantidad();
  scCssBlur(oThis);
  do_ajax_seleccionarproducto_event_cantidad_onblur();
}

function sc_seleccionarproducto_cantidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_cantidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_precio_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_precio();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_precio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_precio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_stock_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_stock();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_stock_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_stock_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_factura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_iva_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_iva();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_iva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_descuento_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_descuento();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_descuento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_descuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_sidescuento_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_sidescuento();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_sidescuento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_sidescuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_tdescuento_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_tdescuento();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_tdescuento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_tdescuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_tiva_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_tiva();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_tiva_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_tiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_subtotal_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_subtotal();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_subtotal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_subtotal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_seleccionarproducto_ahorro_onblur(oThis, iSeqRow) {
  do_ajax_seleccionarproducto_validate_ahorro();
  scCssBlur(oThis);
}

function sc_seleccionarproducto_ahorro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_seleccionarproducto_ahorro_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("producto", "", status);
	displayChange_field("cantidad", "", status);
	displayChange_field("precio", "", status);
	displayChange_field("stock", "", status);
	displayChange_field("iva", "", status);
	displayChange_field("tdescuento", "", status);
	displayChange_field("descuento", "", status);
	displayChange_field("sidescuento", "", status);
	displayChange_field("tiva", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("subtotal", "", status);
	displayChange_field("ahorro", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_producto(row, status);
	displayChange_field_cantidad(row, status);
	displayChange_field_precio(row, status);
	displayChange_field_stock(row, status);
	displayChange_field_iva(row, status);
	displayChange_field_tdescuento(row, status);
	displayChange_field_descuento(row, status);
	displayChange_field_sidescuento(row, status);
	displayChange_field_tiva(row, status);
	displayChange_field_subtotal(row, status);
	displayChange_field_ahorro(row, status);
}

function displayChange_field(field, row, status) {
	if ("producto" == field) {
		displayChange_field_producto(row, status);
	}
	if ("cantidad" == field) {
		displayChange_field_cantidad(row, status);
	}
	if ("precio" == field) {
		displayChange_field_precio(row, status);
	}
	if ("stock" == field) {
		displayChange_field_stock(row, status);
	}
	if ("iva" == field) {
		displayChange_field_iva(row, status);
	}
	if ("tdescuento" == field) {
		displayChange_field_tdescuento(row, status);
	}
	if ("descuento" == field) {
		displayChange_field_descuento(row, status);
	}
	if ("sidescuento" == field) {
		displayChange_field_sidescuento(row, status);
	}
	if ("tiva" == field) {
		displayChange_field_tiva(row, status);
	}
	if ("subtotal" == field) {
		displayChange_field_subtotal(row, status);
	}
	if ("ahorro" == field) {
		displayChange_field_ahorro(row, status);
	}
}

function displayChange_field_producto(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_producto__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_producto" + row).select2("destroy");
		}
		scJQSelect2Add(row, "producto");
	}
}

function displayChange_field_cantidad(row, status) {
}

function displayChange_field_precio(row, status) {
}

function displayChange_field_stock(row, status) {
}

function displayChange_field_iva(row, status) {
}

function displayChange_field_tdescuento(row, status) {
}

function displayChange_field_descuento(row, status) {
}

function displayChange_field_sidescuento(row, status) {
}

function displayChange_field_tiva(row, status) {
}

function displayChange_field_subtotal(row, status) {
}

function displayChange_field_ahorro(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_producto("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_seleccionarproducto_form" + pageNo).hide();
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'seleccionarproducto')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "producto" == specificField) {
    scJQSelect2Add_producto(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_producto(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_producto_obj" : "#id_sc_field_producto" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_producto_obj',
      dropdownCssClass: 'css_producto_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_producto) { displayChange_field_producto(iLine, "on"); } }, 150);
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

