
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
  scEventControl_data["idfaccom" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idpro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["colores" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tallas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["sabor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["cantidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["presentacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valorunit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["valorpar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["iva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["idbod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["descuento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tasaiva" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["tasadesc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["devuelto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["vencimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
  scEventControl_data["lote" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idfaccom" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfaccom" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["colores" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["colores" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tallas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tallas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sabor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sabor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["presentacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["presentacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorunit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valorpar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["iva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idbod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descuento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tasaiva" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tasaiva" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tasadesc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tasadesc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["devuelto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["devuelto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["vencimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["vencimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lote" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lote" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idpro" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("colores" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tallas" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sabor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idbod" + iSeq == fieldName) {
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
  if ("cantidad" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("colores" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("idpro" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("sabor" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("tallas" + iFieldSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = oField.val();
    return;
  }
  if ("valorunit" + iFieldSeq == fieldName) {
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
  $('#id_sc_field_idfaccom' + iSeqRow).bind('blur', function() { sc_detallecompra_idfaccom_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra_idfaccom_onfocus(this, iSeqRow) });
  $('#id_sc_field_idpro' + iSeqRow).bind('blur', function() { sc_detallecompra_idpro_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_detallecompra_idpro_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_detallecompra_idpro_onfocus(this, iSeqRow) });
  $('#id_sc_field_idbod' + iSeqRow).bind('blur', function() { sc_detallecompra_idbod_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_detallecompra_idbod_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidad' + iSeqRow).bind('blur', function() { sc_detallecompra_cantidad_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_detallecompra_cantidad_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra_cantidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorunit' + iSeqRow).bind('blur', function() { sc_detallecompra_valorunit_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_detallecompra_valorunit_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_detallecompra_valorunit_onfocus(this, iSeqRow) });
  $('#id_sc_field_valorpar' + iSeqRow).bind('blur', function() { sc_detallecompra_valorpar_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra_valorpar_onfocus(this, iSeqRow) });
  $('#id_sc_field_iva' + iSeqRow).bind('blur', function() { sc_detallecompra_iva_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_detallecompra_iva_onfocus(this, iSeqRow) });
  $('#id_sc_field_descuento' + iSeqRow).bind('blur', function() { sc_detallecompra_descuento_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_detallecompra_descuento_onfocus(this, iSeqRow) });
  $('#id_sc_field_tasaiva' + iSeqRow).bind('blur', function() { sc_detallecompra_tasaiva_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_detallecompra_tasaiva_onfocus(this, iSeqRow) });
  $('#id_sc_field_tasadesc' + iSeqRow).bind('blur', function() { sc_detallecompra_tasadesc_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra_tasadesc_onfocus(this, iSeqRow) });
  $('#id_sc_field_devuelto' + iSeqRow).bind('blur', function() { sc_detallecompra_devuelto_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_detallecompra_devuelto_onfocus(this, iSeqRow) });
  $('#id_sc_field_colores' + iSeqRow).bind('blur', function() { sc_detallecompra_colores_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_detallecompra_colores_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_detallecompra_colores_onfocus(this, iSeqRow) });
  $('#id_sc_field_tallas' + iSeqRow).bind('blur', function() { sc_detallecompra_tallas_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_detallecompra_tallas_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_detallecompra_tallas_onfocus(this, iSeqRow) });
  $('#id_sc_field_sabor' + iSeqRow).bind('blur', function() { sc_detallecompra_sabor_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_detallecompra_sabor_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_detallecompra_sabor_onfocus(this, iSeqRow) });
  $('#id_sc_field_vencimiento' + iSeqRow).bind('blur', function() { sc_detallecompra_vencimiento_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_detallecompra_vencimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_lote' + iSeqRow).bind('blur', function() { sc_detallecompra_lote_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_detallecompra_lote_onfocus(this, iSeqRow) });
  $('#id_sc_field_presentacion' + iSeqRow).bind('blur', function() { sc_detallecompra_presentacion_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_detallecompra_presentacion_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_detallecompra_idfaccom_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_idfaccom();
  scCssBlur(oThis);
}

function sc_detallecompra_idfaccom_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_idpro_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_idpro();
  scCssBlur(oThis);
}

function sc_detallecompra_idpro_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_event_idpro_onchange();
}

function sc_detallecompra_idpro_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_detallecompra_idbod_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_idbod();
  scCssBlur(oThis);
}

function sc_detallecompra_idbod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_cantidad_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_cantidad();
  scCssBlur(oThis);
}

function sc_detallecompra_cantidad_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_event_cantidad_onchange();
}

function sc_detallecompra_cantidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
  do_ajax_detallecompra_mob_event_cantidad_onfocus();
}

function sc_detallecompra_valorunit_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_valorunit();
  scCssBlur(oThis);
}

function sc_detallecompra_valorunit_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_event_valorunit_onchange();
}

function sc_detallecompra_valorunit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_valorpar_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_valorpar();
  scCssBlur(oThis);
}

function sc_detallecompra_valorpar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_iva_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_iva();
  scCssBlur(oThis);
}

function sc_detallecompra_iva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_descuento_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_descuento();
  scCssBlur(oThis);
}

function sc_detallecompra_descuento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_tasaiva_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_tasaiva();
  scCssBlur(oThis);
}

function sc_detallecompra_tasaiva_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_tasadesc_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_tasadesc();
  scCssBlur(oThis);
}

function sc_detallecompra_tasadesc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_devuelto_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_devuelto();
  scCssBlur(oThis);
}

function sc_detallecompra_devuelto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_colores_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_colores();
  scCssBlur(oThis);
}

function sc_detallecompra_colores_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_event_colores_onchange();
}

function sc_detallecompra_colores_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_tallas_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_tallas();
  scCssBlur(oThis);
}

function sc_detallecompra_tallas_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_event_tallas_onchange();
}

function sc_detallecompra_tallas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_sabor_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_sabor();
  scCssBlur(oThis);
}

function sc_detallecompra_sabor_onchange(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_event_sabor_onchange();
}

function sc_detallecompra_sabor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_vencimiento_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_vencimiento();
  scCssBlur(oThis);
}

function sc_detallecompra_vencimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_lote_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_lote();
  scCssBlur(oThis);
}

function sc_detallecompra_lote_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_detallecompra_presentacion_onblur(oThis, iSeqRow) {
  do_ajax_detallecompra_mob_validate_presentacion();
  scCssBlur(oThis);
}

function sc_detallecompra_presentacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_vencimiento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_vencimiento" + iSeqRow] = $oField.val();
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['vencimiento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
