
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'proveedor':
      case 'modo':
      case 'servidor1':
      case 'servidor2':
      case 'servidor3':
      case 'tokenempresa':
      case 'tokenpassword':
      case 'url_api_pdfs':
      case 'url_api_sendmail':
        sc_exib_ocult_pag('form_webservicefe_mob_form0');
        break;
      case 'servidor_prueba1':
      case 'servidor_prueba2':
      case 'servidor_prueba3':
      case 'token_prueba':
      case 'password_prueba':
      case 'enviar_dian':
      case 'enviar_cliente':
        sc_exib_ocult_pag('form_webservicefe_mob_form1');
        break;
    }
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
  scEventControl_data["proveedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokenempresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokenpassword" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_api_pdfs" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_api_sendmail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor_prueba1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor_prueba2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor_prueba3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["token_prueba" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["password_prueba" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enviar_dian" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enviar_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["proveedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proveedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tokenempresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tokenempresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tokenpassword" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tokenpassword" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_api_pdfs" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_api_pdfs" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_api_sendmail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_api_sendmail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor_prueba1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor_prueba1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor_prueba2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor_prueba2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor_prueba3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor_prueba3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["token_prueba" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["token_prueba" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password_prueba" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password_prueba" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enviar_dian" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enviar_dian" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enviar_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enviar_cliente" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("proveedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("modo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("proveedor" + iSeq == fieldName) {
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
  $('#id_sc_field_proveedor' + iSeqRow).bind('blur', function() { sc_form_webservicefe_proveedor_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_webservicefe_proveedor_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_webservicefe_proveedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor1' + iSeqRow).bind('blur', function() { sc_form_webservicefe_servidor1_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_webservicefe_servidor1_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor2' + iSeqRow).bind('blur', function() { sc_form_webservicefe_servidor2_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_webservicefe_servidor2_onfocus(this, iSeqRow) });
  $('#id_sc_field_tokenempresa' + iSeqRow).bind('blur', function() { sc_form_webservicefe_tokenempresa_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_webservicefe_tokenempresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tokenpassword' + iSeqRow).bind('blur', function() { sc_form_webservicefe_tokenpassword_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_webservicefe_tokenpassword_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor_prueba1' + iSeqRow).bind('blur', function() { sc_form_webservicefe_servidor_prueba1_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_webservicefe_servidor_prueba1_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor_prueba2' + iSeqRow).bind('blur', function() { sc_form_webservicefe_servidor_prueba2_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_webservicefe_servidor_prueba2_onfocus(this, iSeqRow) });
  $('#id_sc_field_token_prueba' + iSeqRow).bind('blur', function() { sc_form_webservicefe_token_prueba_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_webservicefe_token_prueba_onfocus(this, iSeqRow) });
  $('#id_sc_field_password_prueba' + iSeqRow).bind('blur', function() { sc_form_webservicefe_password_prueba_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_webservicefe_password_prueba_onfocus(this, iSeqRow) });
  $('#id_sc_field_modo' + iSeqRow).bind('blur', function() { sc_form_webservicefe_modo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_webservicefe_modo_onfocus(this, iSeqRow) });
  $('#id_sc_field_enviar_dian' + iSeqRow).bind('blur', function() { sc_form_webservicefe_enviar_dian_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_webservicefe_enviar_dian_onfocus(this, iSeqRow) });
  $('#id_sc_field_enviar_cliente' + iSeqRow).bind('blur', function() { sc_form_webservicefe_enviar_cliente_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_webservicefe_enviar_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor3' + iSeqRow).bind('blur', function() { sc_form_webservicefe_servidor3_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_webservicefe_servidor3_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor_prueba3' + iSeqRow).bind('blur', function() { sc_form_webservicefe_servidor_prueba3_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_webservicefe_servidor_prueba3_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_api_pdfs' + iSeqRow).bind('blur', function() { sc_form_webservicefe_url_api_pdfs_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_webservicefe_url_api_pdfs_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_api_sendmail' + iSeqRow).bind('blur', function() { sc_form_webservicefe_url_api_sendmail_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_webservicefe_url_api_sendmail_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-enviar_dian' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-enviar_cliente' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_webservicefe_proveedor_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_proveedor();
  scCssBlur(oThis);
}

function sc_form_webservicefe_proveedor_onchange(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_event_proveedor_onchange();
}

function sc_form_webservicefe_proveedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_servidor1_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_servidor1();
  scCssBlur(oThis);
}

function sc_form_webservicefe_servidor1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_servidor2_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_servidor2();
  scCssBlur(oThis);
}

function sc_form_webservicefe_servidor2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_tokenempresa_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_tokenempresa();
  scCssBlur(oThis);
}

function sc_form_webservicefe_tokenempresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_tokenpassword_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_tokenpassword();
  scCssBlur(oThis);
}

function sc_form_webservicefe_tokenpassword_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_servidor_prueba1_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_servidor_prueba1();
  scCssBlur(oThis);
}

function sc_form_webservicefe_servidor_prueba1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_servidor_prueba2_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_servidor_prueba2();
  scCssBlur(oThis);
}

function sc_form_webservicefe_servidor_prueba2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_token_prueba_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_token_prueba();
  scCssBlur(oThis);
}

function sc_form_webservicefe_token_prueba_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_password_prueba_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_password_prueba();
  scCssBlur(oThis);
}

function sc_form_webservicefe_password_prueba_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_modo_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_modo();
  scCssBlur(oThis);
}

function sc_form_webservicefe_modo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_enviar_dian_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_enviar_dian();
  scCssBlur(oThis);
}

function sc_form_webservicefe_enviar_dian_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_enviar_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_enviar_cliente();
  scCssBlur(oThis);
}

function sc_form_webservicefe_enviar_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_servidor3_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_servidor3();
  scCssBlur(oThis);
}

function sc_form_webservicefe_servidor3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_servidor_prueba3_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_servidor_prueba3();
  scCssBlur(oThis);
}

function sc_form_webservicefe_servidor_prueba3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_url_api_pdfs_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_url_api_pdfs();
  scCssBlur(oThis);
}

function sc_form_webservicefe_url_api_pdfs_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_webservicefe_url_api_sendmail_onblur(oThis, iSeqRow) {
  do_ajax_form_webservicefe_mob_validate_url_api_sendmail();
  scCssBlur(oThis);
}

function sc_form_webservicefe_url_api_sendmail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
}

function displayChange_page_1(status) {
	displayChange_block("1", status);
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
	displayChange_field("proveedor", "", status);
	displayChange_field("modo", "", status);
	displayChange_field("servidor1", "", status);
	displayChange_field("servidor2", "", status);
	displayChange_field("servidor3", "", status);
	displayChange_field("tokenempresa", "", status);
	displayChange_field("tokenpassword", "", status);
	displayChange_field("url_api_pdfs", "", status);
	displayChange_field("url_api_sendmail", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("servidor_prueba1", "", status);
	displayChange_field("servidor_prueba2", "", status);
	displayChange_field("servidor_prueba3", "", status);
	displayChange_field("token_prueba", "", status);
	displayChange_field("password_prueba", "", status);
	displayChange_field("enviar_dian", "", status);
	displayChange_field("enviar_cliente", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_proveedor(row, status);
	displayChange_field_modo(row, status);
	displayChange_field_servidor1(row, status);
	displayChange_field_servidor2(row, status);
	displayChange_field_servidor3(row, status);
	displayChange_field_tokenempresa(row, status);
	displayChange_field_tokenpassword(row, status);
	displayChange_field_url_api_pdfs(row, status);
	displayChange_field_url_api_sendmail(row, status);
	displayChange_field_servidor_prueba1(row, status);
	displayChange_field_servidor_prueba2(row, status);
	displayChange_field_servidor_prueba3(row, status);
	displayChange_field_token_prueba(row, status);
	displayChange_field_password_prueba(row, status);
	displayChange_field_enviar_dian(row, status);
	displayChange_field_enviar_cliente(row, status);
}

function displayChange_field(field, row, status) {
	if ("proveedor" == field) {
		displayChange_field_proveedor(row, status);
	}
	if ("modo" == field) {
		displayChange_field_modo(row, status);
	}
	if ("servidor1" == field) {
		displayChange_field_servidor1(row, status);
	}
	if ("servidor2" == field) {
		displayChange_field_servidor2(row, status);
	}
	if ("servidor3" == field) {
		displayChange_field_servidor3(row, status);
	}
	if ("tokenempresa" == field) {
		displayChange_field_tokenempresa(row, status);
	}
	if ("tokenpassword" == field) {
		displayChange_field_tokenpassword(row, status);
	}
	if ("url_api_pdfs" == field) {
		displayChange_field_url_api_pdfs(row, status);
	}
	if ("url_api_sendmail" == field) {
		displayChange_field_url_api_sendmail(row, status);
	}
	if ("servidor_prueba1" == field) {
		displayChange_field_servidor_prueba1(row, status);
	}
	if ("servidor_prueba2" == field) {
		displayChange_field_servidor_prueba2(row, status);
	}
	if ("servidor_prueba3" == field) {
		displayChange_field_servidor_prueba3(row, status);
	}
	if ("token_prueba" == field) {
		displayChange_field_token_prueba(row, status);
	}
	if ("password_prueba" == field) {
		displayChange_field_password_prueba(row, status);
	}
	if ("enviar_dian" == field) {
		displayChange_field_enviar_dian(row, status);
	}
	if ("enviar_cliente" == field) {
		displayChange_field_enviar_cliente(row, status);
	}
}

function displayChange_field_proveedor(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_proveedor__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_proveedor" + row).select2("destroy");
		}
		scJQSelect2Add(row, "proveedor");
	}
}

function displayChange_field_modo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_modo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_modo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "modo");
	}
}

function displayChange_field_servidor1(row, status) {
}

function displayChange_field_servidor2(row, status) {
}

function displayChange_field_servidor3(row, status) {
}

function displayChange_field_tokenempresa(row, status) {
}

function displayChange_field_tokenpassword(row, status) {
}

function displayChange_field_url_api_pdfs(row, status) {
}

function displayChange_field_url_api_sendmail(row, status) {
}

function displayChange_field_servidor_prueba1(row, status) {
}

function displayChange_field_servidor_prueba2(row, status) {
}

function displayChange_field_servidor_prueba3(row, status) {
}

function displayChange_field_token_prueba(row, status) {
}

function displayChange_field_password_prueba(row, status) {
}

function displayChange_field_enviar_dian(row, status) {
}

function displayChange_field_enviar_cliente(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_proveedor("all", "on");
	displayChange_field_modo("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_webservicefe_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_webservicefe_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "proveedor" == specificField) {
    scJQSelect2Add_proveedor(seqRow);
  }
  if (null == specificField || "modo" == specificField) {
    scJQSelect2Add_modo(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_proveedor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_proveedor_obj" : "#id_sc_field_proveedor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_proveedor_obj',
      dropdownCssClass: 'css_proveedor_obj',
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

function scJQSelect2Add_modo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_modo_obj" : "#id_sc_field_modo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_modo_obj',
      dropdownCssClass: 'css_modo_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_proveedor) { displayChange_field_proveedor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_modo) { displayChange_field_modo(iLine, "on"); } }, 150);
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

