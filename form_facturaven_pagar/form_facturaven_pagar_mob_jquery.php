
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
  scEventControl_data["numfacven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["fechaven" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idcli" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["asentada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["pagada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["total" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["adicional2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["adicional3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["numfacven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["numfacven" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechaven" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idcli" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asentada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["total" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["adicional3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["adicional3" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idcli" + iSeq == fieldName) {
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
  if ("adicional2" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_numfacven' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_numfacven_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_facturaven_pagar_numfacven_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechaven' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_fechaven_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_facturaven_pagar_fechaven_onfocus(this, iSeqRow) });
  $('#id_sc_field_idcli' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_idcli_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_facturaven_pagar_idcli_onfocus(this, iSeqRow) });
  $('#id_sc_field_total' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_total_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_facturaven_pagar_total_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagada' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_pagada_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_facturaven_pagar_pagada_onfocus(this, iSeqRow) });
  $('#id_sc_field_asentada' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_asentada_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_facturaven_pagar_asentada_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_adicional_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_facturaven_pagar_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional2' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_adicional2_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_facturaven_pagar_adicional2_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_facturaven_pagar_adicional2_onfocus(this, iSeqRow) });
  $('#id_sc_field_adicional3' + iSeqRow).bind('blur', function() { sc_form_facturaven_pagar_adicional3_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_facturaven_pagar_adicional3_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_facturaven_pagar_numfacven_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_numfacven();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_numfacven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_fechaven_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_fechaven();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_fechaven_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_idcli_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_idcli();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_idcli_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_total_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_total();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_total_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_pagada_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_pagada();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_pagada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_asentada_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_asentada();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_asentada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_adicional();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_adicional2_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_adicional2();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_adicional2_onchange(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_event_adicional2_onchange();
}

function sc_form_facturaven_pagar_adicional2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_facturaven_pagar_adicional3_onblur(oThis, iSeqRow) {
  do_ajax_form_facturaven_pagar_mob_validate_adicional3();
  scCssBlur(oThis);
}

function sc_form_facturaven_pagar_adicional3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_fechavenc" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechavenc" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechavenc']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->jqueryIconFile('calendar'); ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
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
