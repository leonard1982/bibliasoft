
function scJQGeneralAdd() {
  $('input:text.sc-js-input').listen();
  $('input:password.sc-js-input').listen();
  $('input:checkbox.sc-js-input').listen();
  $('input:radio.sc-js-input').listen();
  $('select.sc-js-input').listen();
  $('textarea.sc-js-input').listen();

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if (false == scSetFocusOnField($oField) && $("#id_ac_" + sField).length > 0) {
    if (false == scSetFocusOnField($("#id_ac_" + sField))) {
      setTimeout(function () { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
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
  scEventControl_data["prefijo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tipodocumento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idformato" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["encabezado_pos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pie_pos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["prefijo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["prefijo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipodocumento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipodocumento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idformato" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idformato" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["encabezado_pos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["encabezado_pos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pie_pos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pie_pos" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("prefijo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipodocumento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idformato" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onChange_call(sFieldName, iFieldSeq) {
  var oField, fieldId, fieldName;
  oField = $("#id_sc_field_" + sFieldName + iFieldSeq);
  fieldId = oField.attr("id");
  fieldName = fieldId.substr(12);
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_prefijo' + iSeqRow).bind('blur', function() { sc_form_formatosimpresion_prefijo_prefijo_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_formatosimpresion_prefijo_prefijo_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodocumento' + iSeqRow).bind('blur', function() { sc_form_formatosimpresion_prefijo_tipodocumento_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_formatosimpresion_prefijo_tipodocumento_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_formatosimpresion_prefijo_tipodocumento_onfocus(this, iSeqRow) });
  $('#id_sc_field_idformato' + iSeqRow).bind('blur', function() { sc_form_formatosimpresion_prefijo_idformato_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_formatosimpresion_prefijo_idformato_onfocus(this, iSeqRow) });
  $('#id_sc_field_encabezado_pos' + iSeqRow).bind('blur', function() { sc_form_formatosimpresion_prefijo_encabezado_pos_onblur(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_formatosimpresion_prefijo_encabezado_pos_onfocus(this, iSeqRow) });
  $('#id_sc_field_pie_pos' + iSeqRow).bind('blur', function() { sc_form_formatosimpresion_prefijo_pie_pos_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_formatosimpresion_prefijo_pie_pos_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_formatosimpresion_prefijo_prefijo_onblur(oThis, iSeqRow) {
  do_ajax_form_formatosimpresion_prefijo_mob_validate_prefijo();
  scCssBlur(oThis);
}

function sc_form_formatosimpresion_prefijo_prefijo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_formatosimpresion_prefijo_tipodocumento_onblur(oThis, iSeqRow) {
  do_ajax_form_formatosimpresion_prefijo_mob_validate_tipodocumento();
  scCssBlur(oThis);
}

function sc_form_formatosimpresion_prefijo_tipodocumento_onchange(oThis, iSeqRow) {
  do_ajax_form_formatosimpresion_prefijo_mob_refresh_tipodocumento();
}

function sc_form_formatosimpresion_prefijo_tipodocumento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_formatosimpresion_prefijo_idformato_onblur(oThis, iSeqRow) {
  do_ajax_form_formatosimpresion_prefijo_mob_validate_idformato();
  scCssBlur(oThis);
}

function sc_form_formatosimpresion_prefijo_idformato_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_formatosimpresion_prefijo_encabezado_pos_onblur(oThis, iSeqRow) {
  do_ajax_form_formatosimpresion_prefijo_mob_validate_encabezado_pos();
  scCssBlur(oThis);
}

function sc_form_formatosimpresion_prefijo_encabezado_pos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_formatosimpresion_prefijo_pie_pos_onblur(oThis, iSeqRow) {
  do_ajax_form_formatosimpresion_prefijo_mob_validate_pie_pos();
  scCssBlur(oThis);
}

function sc_form_formatosimpresion_prefijo_pie_pos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    setTimeout(function() {
      scBtnGrpHide(sGroup);
    }, 1000);
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup);
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
      scBtnGrpHide(sGroup);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup) {
  if ('over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
  }
}
