
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
  scEventControl_data["idetiqueta" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_configuracion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["titulo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idfamilia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nompro" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["size_letra_descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_letra" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["columnas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_imagen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["altura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anchura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["precio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["personalizado1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["personalizado2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["personalizado3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["espaciado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ancho_descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["size_letra_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["size_letra_precio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["size_letra_perso1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["size_letra_perso2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["size_letra_perso3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_descripcion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_precio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_perso1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_perso2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["posicion_perso3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["alineacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["copias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["idetiqueta" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idetiqueta" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_configuracion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_configuracion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["titulo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["titulo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idfamilia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idfamilia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nompro" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nompro" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["size_letra_descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["size_letra_descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_letra" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_letra" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["columnas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["columnas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_imagen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_imagen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["altura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["altura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anchura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anchura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["precio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["precio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["personalizado1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["personalizado1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["personalizado2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["personalizado2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["personalizado3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["personalizado3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["espaciado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["espaciado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ancho_descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ancho_descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["size_letra_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["size_letra_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["size_letra_precio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["size_letra_precio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["size_letra_perso1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["size_letra_perso1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["size_letra_perso2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["size_letra_perso2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["size_letra_perso3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["size_letra_perso3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_descripcion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_descripcion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_precio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_precio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_perso1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_perso1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_perso2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_perso2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["posicion_perso3" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["posicion_perso3" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["alineacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["alineacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["copias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["copias" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("idfamilia" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_letra" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_codigo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_imagen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("precio" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("alineacion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("codigo" + iSeq == fieldName) {
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
  $('#id_sc_field_idetiqueta' + iSeqRow).bind('blur', function() { sc_form_etiquetas_idetiqueta_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_etiquetas_idetiqueta_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_etiquetas_idetiqueta_onfocus(this, iSeqRow) });
  $('#id_sc_field_idfamilia' + iSeqRow).bind('blur', function() { sc_form_etiquetas_idfamilia_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_etiquetas_idfamilia_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_etiquetas_idfamilia_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo' + iSeqRow).bind('blur', function() { sc_form_etiquetas_codigo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_etiquetas_codigo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_etiquetas_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_descripcion' + iSeqRow).bind('blur', function() { sc_form_etiquetas_descripcion_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_etiquetas_descripcion_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_etiquetas_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_size_letra_descripcion' + iSeqRow).bind('blur', function() { sc_form_etiquetas_size_letra_descripcion_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_etiquetas_size_letra_descripcion_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_etiquetas_size_letra_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_letra' + iSeqRow).bind('blur', function() { sc_form_etiquetas_tipo_letra_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_etiquetas_tipo_letra_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_etiquetas_tipo_letra_onfocus(this, iSeqRow) });
  $('#id_sc_field_columnas' + iSeqRow).bind('blur', function() { sc_form_etiquetas_columnas_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_etiquetas_columnas_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_etiquetas_columnas_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_codigo' + iSeqRow).bind('blur', function() { sc_form_etiquetas_tipo_codigo_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_etiquetas_tipo_codigo_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_etiquetas_tipo_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_imagen' + iSeqRow).bind('blur', function() { sc_form_etiquetas_tipo_imagen_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_etiquetas_tipo_imagen_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_etiquetas_tipo_imagen_onfocus(this, iSeqRow) });
  $('#id_sc_field_altura' + iSeqRow).bind('blur', function() { sc_form_etiquetas_altura_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_etiquetas_altura_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_etiquetas_altura_onfocus(this, iSeqRow) });
  $('#id_sc_field_anchura' + iSeqRow).bind('blur', function() { sc_form_etiquetas_anchura_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_etiquetas_anchura_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_etiquetas_anchura_onfocus(this, iSeqRow) });
  $('#id_sc_field_precio' + iSeqRow).bind('blur', function() { sc_form_etiquetas_precio_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_etiquetas_precio_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_etiquetas_precio_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_codigo' + iSeqRow).bind('blur', function() { sc_form_etiquetas_ver_codigo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_etiquetas_ver_codigo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_etiquetas_ver_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_descripcion' + iSeqRow).bind('blur', function() { sc_form_etiquetas_ver_descripcion_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_etiquetas_ver_descripcion_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_etiquetas_ver_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_titulo' + iSeqRow).bind('blur', function() { sc_form_etiquetas_titulo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_etiquetas_titulo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_etiquetas_titulo_onfocus(this, iSeqRow) });
  $('#id_sc_field_personalizado1' + iSeqRow).bind('blur', function() { sc_form_etiquetas_personalizado1_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_etiquetas_personalizado1_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_etiquetas_personalizado1_onfocus(this, iSeqRow) });
  $('#id_sc_field_personalizado2' + iSeqRow).bind('blur', function() { sc_form_etiquetas_personalizado2_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_etiquetas_personalizado2_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_etiquetas_personalizado2_onfocus(this, iSeqRow) });
  $('#id_sc_field_personalizado3' + iSeqRow).bind('blur', function() { sc_form_etiquetas_personalizado3_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_etiquetas_personalizado3_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_etiquetas_personalizado3_onfocus(this, iSeqRow) });
  $('#id_sc_field_espaciado' + iSeqRow).bind('blur', function() { sc_form_etiquetas_espaciado_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_etiquetas_espaciado_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_etiquetas_espaciado_onfocus(this, iSeqRow) });
  $('#id_sc_field_ancho_descripcion' + iSeqRow).bind('blur', function() { sc_form_etiquetas_ancho_descripcion_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_etiquetas_ancho_descripcion_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_etiquetas_ancho_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_size_letra_codigo' + iSeqRow).bind('blur', function() { sc_form_etiquetas_size_letra_codigo_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_etiquetas_size_letra_codigo_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_etiquetas_size_letra_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_size_letra_precio' + iSeqRow).bind('blur', function() { sc_form_etiquetas_size_letra_precio_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_etiquetas_size_letra_precio_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_etiquetas_size_letra_precio_onfocus(this, iSeqRow) });
  $('#id_sc_field_size_letra_perso1' + iSeqRow).bind('blur', function() { sc_form_etiquetas_size_letra_perso1_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_etiquetas_size_letra_perso1_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_etiquetas_size_letra_perso1_onfocus(this, iSeqRow) });
  $('#id_sc_field_size_letra_perso2' + iSeqRow).bind('blur', function() { sc_form_etiquetas_size_letra_perso2_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_etiquetas_size_letra_perso2_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_etiquetas_size_letra_perso2_onfocus(this, iSeqRow) });
  $('#id_sc_field_size_letra_perso3' + iSeqRow).bind('blur', function() { sc_form_etiquetas_size_letra_perso3_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_etiquetas_size_letra_perso3_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_etiquetas_size_letra_perso3_onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_codigo' + iSeqRow).bind('blur', function() { sc_form_etiquetas_posicion_codigo_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_etiquetas_posicion_codigo_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_etiquetas_posicion_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_descripcion' + iSeqRow).bind('blur', function() { sc_form_etiquetas_posicion_descripcion_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_etiquetas_posicion_descripcion_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_etiquetas_posicion_descripcion_onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_precio' + iSeqRow).bind('blur', function() { sc_form_etiquetas_posicion_precio_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_etiquetas_posicion_precio_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_etiquetas_posicion_precio_onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_perso1' + iSeqRow).bind('blur', function() { sc_form_etiquetas_posicion_perso1_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_etiquetas_posicion_perso1_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_etiquetas_posicion_perso1_onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_perso2' + iSeqRow).bind('blur', function() { sc_form_etiquetas_posicion_perso2_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_etiquetas_posicion_perso2_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_etiquetas_posicion_perso2_onfocus(this, iSeqRow) });
  $('#id_sc_field_posicion_perso3' + iSeqRow).bind('blur', function() { sc_form_etiquetas_posicion_perso3_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_etiquetas_posicion_perso3_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_etiquetas_posicion_perso3_onfocus(this, iSeqRow) });
  $('#id_sc_field_alineacion' + iSeqRow).bind('blur', function() { sc_form_etiquetas_alineacion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_etiquetas_alineacion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_etiquetas_alineacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_configuracion' + iSeqRow).bind('blur', function() { sc_form_etiquetas_nombre_configuracion_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_etiquetas_nombre_configuracion_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_etiquetas_nombre_configuracion_onfocus(this, iSeqRow) });
  $('#id_sc_field_copias' + iSeqRow).bind('blur', function() { sc_form_etiquetas_copias_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_etiquetas_copias_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_etiquetas_copias_onfocus(this, iSeqRow) });
  $('#id_sc_field_nompro' + iSeqRow).bind('blur', function() { sc_form_etiquetas_nompro_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_etiquetas_nompro_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_etiquetas_nompro_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-ver_codigo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_descripcion' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_etiquetas_idetiqueta_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_idetiqueta();
  scCssBlur(oThis);
}

function sc_form_etiquetas_idetiqueta_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_idetiqueta_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_idfamilia_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_idfamilia();
  scCssBlur(oThis);
}

function sc_form_etiquetas_idfamilia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_idfamilia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_codigo();
  scCssBlur(oThis);
}

function sc_form_etiquetas_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_form_etiquetas_event_codigo_onchange();
}

function sc_form_etiquetas_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_descripcion();
  scCssBlur(oThis);
}

function sc_form_etiquetas_descripcion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_size_letra_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_size_letra_descripcion();
  scCssBlur(oThis);
}

function sc_form_etiquetas_size_letra_descripcion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_size_letra_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_tipo_letra_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_tipo_letra();
  scCssBlur(oThis);
}

function sc_form_etiquetas_tipo_letra_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_tipo_letra_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_columnas_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_columnas();
  scCssBlur(oThis);
}

function sc_form_etiquetas_columnas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_columnas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_tipo_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_tipo_codigo();
  scCssBlur(oThis);
}

function sc_form_etiquetas_tipo_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_tipo_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_tipo_imagen_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_tipo_imagen();
  scCssBlur(oThis);
}

function sc_form_etiquetas_tipo_imagen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_tipo_imagen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_altura_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_altura();
  scCssBlur(oThis);
}

function sc_form_etiquetas_altura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_altura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_anchura_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_anchura();
  scCssBlur(oThis);
}

function sc_form_etiquetas_anchura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_anchura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_precio_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_precio();
  scCssBlur(oThis);
}

function sc_form_etiquetas_precio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_precio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_ver_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_ver_codigo();
  scCssBlur(oThis);
}

function sc_form_etiquetas_ver_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_ver_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_ver_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_ver_descripcion();
  scCssBlur(oThis);
}

function sc_form_etiquetas_ver_descripcion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_ver_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_titulo_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_titulo();
  scCssBlur(oThis);
}

function sc_form_etiquetas_titulo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_titulo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_personalizado1_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_personalizado1();
  scCssBlur(oThis);
}

function sc_form_etiquetas_personalizado1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_personalizado1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_personalizado2_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_personalizado2();
  scCssBlur(oThis);
}

function sc_form_etiquetas_personalizado2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_personalizado2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_personalizado3_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_personalizado3();
  scCssBlur(oThis);
}

function sc_form_etiquetas_personalizado3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_personalizado3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_espaciado_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_espaciado();
  scCssBlur(oThis);
}

function sc_form_etiquetas_espaciado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_espaciado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_ancho_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_ancho_descripcion();
  scCssBlur(oThis);
}

function sc_form_etiquetas_ancho_descripcion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_ancho_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_size_letra_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_size_letra_codigo();
  scCssBlur(oThis);
}

function sc_form_etiquetas_size_letra_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_size_letra_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_size_letra_precio_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_size_letra_precio();
  scCssBlur(oThis);
}

function sc_form_etiquetas_size_letra_precio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_size_letra_precio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_size_letra_perso1_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_size_letra_perso1();
  scCssBlur(oThis);
}

function sc_form_etiquetas_size_letra_perso1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_size_letra_perso1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_size_letra_perso2_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_size_letra_perso2();
  scCssBlur(oThis);
}

function sc_form_etiquetas_size_letra_perso2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_size_letra_perso2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_size_letra_perso3_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_size_letra_perso3();
  scCssBlur(oThis);
}

function sc_form_etiquetas_size_letra_perso3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_size_letra_perso3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_posicion_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_posicion_codigo();
  scCssBlur(oThis);
}

function sc_form_etiquetas_posicion_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_posicion_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_posicion_descripcion_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_posicion_descripcion();
  scCssBlur(oThis);
}

function sc_form_etiquetas_posicion_descripcion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_posicion_descripcion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_posicion_precio_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_posicion_precio();
  scCssBlur(oThis);
}

function sc_form_etiquetas_posicion_precio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_posicion_precio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_posicion_perso1_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_posicion_perso1();
  scCssBlur(oThis);
}

function sc_form_etiquetas_posicion_perso1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_posicion_perso1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_posicion_perso2_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_posicion_perso2();
  scCssBlur(oThis);
}

function sc_form_etiquetas_posicion_perso2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_posicion_perso2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_posicion_perso3_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_posicion_perso3();
  scCssBlur(oThis);
}

function sc_form_etiquetas_posicion_perso3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_posicion_perso3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_alineacion_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_alineacion();
  scCssBlur(oThis);
}

function sc_form_etiquetas_alineacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_alineacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_nombre_configuracion_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_nombre_configuracion();
  scCssBlur(oThis);
}

function sc_form_etiquetas_nombre_configuracion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_nombre_configuracion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_copias_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_copias();
  scCssBlur(oThis);
}

function sc_form_etiquetas_copias_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_copias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_etiquetas_nompro_onblur(oThis, iSeqRow) {
  do_ajax_form_etiquetas_validate_nompro();
  scCssBlur(oThis);
}

function sc_form_etiquetas_nompro_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_etiquetas_nompro_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("idetiqueta", "", status);
	displayChange_field("nombre_configuracion", "", status);
	displayChange_field("titulo", "", status);
	displayChange_field("idfamilia", "", status);
	displayChange_field("codigo", "", status);
	displayChange_field("nompro", "", status);
	displayChange_field("descripcion", "", status);
	displayChange_field("size_letra_descripcion", "", status);
	displayChange_field("tipo_letra", "", status);
	displayChange_field("columnas", "", status);
	displayChange_field("tipo_codigo", "", status);
	displayChange_field("tipo_imagen", "", status);
	displayChange_field("altura", "", status);
	displayChange_field("anchura", "", status);
	displayChange_field("precio", "", status);
	displayChange_field("ver_codigo", "", status);
	displayChange_field("ver_descripcion", "", status);
	displayChange_field("personalizado1", "", status);
	displayChange_field("personalizado2", "", status);
	displayChange_field("personalizado3", "", status);
	displayChange_field("espaciado", "", status);
	displayChange_field("ancho_descripcion", "", status);
	displayChange_field("size_letra_codigo", "", status);
	displayChange_field("size_letra_precio", "", status);
	displayChange_field("size_letra_perso1", "", status);
	displayChange_field("size_letra_perso2", "", status);
	displayChange_field("size_letra_perso3", "", status);
	displayChange_field("posicion_codigo", "", status);
	displayChange_field("posicion_descripcion", "", status);
	displayChange_field("posicion_precio", "", status);
	displayChange_field("posicion_perso1", "", status);
	displayChange_field("posicion_perso2", "", status);
	displayChange_field("posicion_perso3", "", status);
	displayChange_field("alineacion", "", status);
	displayChange_field("copias", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_idetiqueta(row, status);
	displayChange_field_nombre_configuracion(row, status);
	displayChange_field_titulo(row, status);
	displayChange_field_idfamilia(row, status);
	displayChange_field_codigo(row, status);
	displayChange_field_nompro(row, status);
	displayChange_field_descripcion(row, status);
	displayChange_field_size_letra_descripcion(row, status);
	displayChange_field_tipo_letra(row, status);
	displayChange_field_columnas(row, status);
	displayChange_field_tipo_codigo(row, status);
	displayChange_field_tipo_imagen(row, status);
	displayChange_field_altura(row, status);
	displayChange_field_anchura(row, status);
	displayChange_field_precio(row, status);
	displayChange_field_ver_codigo(row, status);
	displayChange_field_ver_descripcion(row, status);
	displayChange_field_personalizado1(row, status);
	displayChange_field_personalizado2(row, status);
	displayChange_field_personalizado3(row, status);
	displayChange_field_espaciado(row, status);
	displayChange_field_ancho_descripcion(row, status);
	displayChange_field_size_letra_codigo(row, status);
	displayChange_field_size_letra_precio(row, status);
	displayChange_field_size_letra_perso1(row, status);
	displayChange_field_size_letra_perso2(row, status);
	displayChange_field_size_letra_perso3(row, status);
	displayChange_field_posicion_codigo(row, status);
	displayChange_field_posicion_descripcion(row, status);
	displayChange_field_posicion_precio(row, status);
	displayChange_field_posicion_perso1(row, status);
	displayChange_field_posicion_perso2(row, status);
	displayChange_field_posicion_perso3(row, status);
	displayChange_field_alineacion(row, status);
	displayChange_field_copias(row, status);
}

function displayChange_field(field, row, status) {
	if ("idetiqueta" == field) {
		displayChange_field_idetiqueta(row, status);
	}
	if ("nombre_configuracion" == field) {
		displayChange_field_nombre_configuracion(row, status);
	}
	if ("titulo" == field) {
		displayChange_field_titulo(row, status);
	}
	if ("idfamilia" == field) {
		displayChange_field_idfamilia(row, status);
	}
	if ("codigo" == field) {
		displayChange_field_codigo(row, status);
	}
	if ("nompro" == field) {
		displayChange_field_nompro(row, status);
	}
	if ("descripcion" == field) {
		displayChange_field_descripcion(row, status);
	}
	if ("size_letra_descripcion" == field) {
		displayChange_field_size_letra_descripcion(row, status);
	}
	if ("tipo_letra" == field) {
		displayChange_field_tipo_letra(row, status);
	}
	if ("columnas" == field) {
		displayChange_field_columnas(row, status);
	}
	if ("tipo_codigo" == field) {
		displayChange_field_tipo_codigo(row, status);
	}
	if ("tipo_imagen" == field) {
		displayChange_field_tipo_imagen(row, status);
	}
	if ("altura" == field) {
		displayChange_field_altura(row, status);
	}
	if ("anchura" == field) {
		displayChange_field_anchura(row, status);
	}
	if ("precio" == field) {
		displayChange_field_precio(row, status);
	}
	if ("ver_codigo" == field) {
		displayChange_field_ver_codigo(row, status);
	}
	if ("ver_descripcion" == field) {
		displayChange_field_ver_descripcion(row, status);
	}
	if ("personalizado1" == field) {
		displayChange_field_personalizado1(row, status);
	}
	if ("personalizado2" == field) {
		displayChange_field_personalizado2(row, status);
	}
	if ("personalizado3" == field) {
		displayChange_field_personalizado3(row, status);
	}
	if ("espaciado" == field) {
		displayChange_field_espaciado(row, status);
	}
	if ("ancho_descripcion" == field) {
		displayChange_field_ancho_descripcion(row, status);
	}
	if ("size_letra_codigo" == field) {
		displayChange_field_size_letra_codigo(row, status);
	}
	if ("size_letra_precio" == field) {
		displayChange_field_size_letra_precio(row, status);
	}
	if ("size_letra_perso1" == field) {
		displayChange_field_size_letra_perso1(row, status);
	}
	if ("size_letra_perso2" == field) {
		displayChange_field_size_letra_perso2(row, status);
	}
	if ("size_letra_perso3" == field) {
		displayChange_field_size_letra_perso3(row, status);
	}
	if ("posicion_codigo" == field) {
		displayChange_field_posicion_codigo(row, status);
	}
	if ("posicion_descripcion" == field) {
		displayChange_field_posicion_descripcion(row, status);
	}
	if ("posicion_precio" == field) {
		displayChange_field_posicion_precio(row, status);
	}
	if ("posicion_perso1" == field) {
		displayChange_field_posicion_perso1(row, status);
	}
	if ("posicion_perso2" == field) {
		displayChange_field_posicion_perso2(row, status);
	}
	if ("posicion_perso3" == field) {
		displayChange_field_posicion_perso3(row, status);
	}
	if ("alineacion" == field) {
		displayChange_field_alineacion(row, status);
	}
	if ("copias" == field) {
		displayChange_field_copias(row, status);
	}
}

function displayChange_field_idetiqueta(row, status) {
}

function displayChange_field_nombre_configuracion(row, status) {
}

function displayChange_field_titulo(row, status) {
}

function displayChange_field_idfamilia(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idfamilia__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idfamilia" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idfamilia");
	}
}

function displayChange_field_codigo(row, status) {
}

function displayChange_field_nompro(row, status) {
}

function displayChange_field_descripcion(row, status) {
}

function displayChange_field_size_letra_descripcion(row, status) {
}

function displayChange_field_tipo_letra(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_letra__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_letra" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_letra");
	}
}

function displayChange_field_columnas(row, status) {
}

function displayChange_field_tipo_codigo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_codigo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_codigo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_codigo");
	}
}

function displayChange_field_tipo_imagen(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_imagen__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_imagen" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_imagen");
	}
}

function displayChange_field_altura(row, status) {
}

function displayChange_field_anchura(row, status) {
}

function displayChange_field_precio(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_precio__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_precio" + row).select2("destroy");
		}
		scJQSelect2Add(row, "precio");
	}
}

function displayChange_field_ver_codigo(row, status) {
}

function displayChange_field_ver_descripcion(row, status) {
}

function displayChange_field_personalizado1(row, status) {
}

function displayChange_field_personalizado2(row, status) {
}

function displayChange_field_personalizado3(row, status) {
}

function displayChange_field_espaciado(row, status) {
}

function displayChange_field_ancho_descripcion(row, status) {
}

function displayChange_field_size_letra_codigo(row, status) {
}

function displayChange_field_size_letra_precio(row, status) {
}

function displayChange_field_size_letra_perso1(row, status) {
}

function displayChange_field_size_letra_perso2(row, status) {
}

function displayChange_field_size_letra_perso3(row, status) {
}

function displayChange_field_posicion_codigo(row, status) {
}

function displayChange_field_posicion_descripcion(row, status) {
}

function displayChange_field_posicion_precio(row, status) {
}

function displayChange_field_posicion_perso1(row, status) {
}

function displayChange_field_posicion_perso2(row, status) {
}

function displayChange_field_posicion_perso3(row, status) {
}

function displayChange_field_alineacion(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_alineacion__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_alineacion" + row).select2("destroy");
		}
		scJQSelect2Add(row, "alineacion");
	}
}

function displayChange_field_copias(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_idfamilia("all", "on");
	displayChange_field_tipo_letra("all", "on");
	displayChange_field_tipo_codigo("all", "on");
	displayChange_field_tipo_imagen("all", "on");
	displayChange_field_precio("all", "on");
	displayChange_field_alineacion("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_etiquetas_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(22);
		}
	}
}
function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_size_letra_descripcion" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_altura" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_anchura" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_size_letra_codigo" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_size_letra_precio" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_size_letra_perso1" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_size_letra_perso2" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_size_letra_perso3" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_posicion_codigo" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_posicion_descripcion" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_posicion_precio" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_posicion_perso1" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_posicion_perso2" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_posicion_perso3" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_copias" + iSeqRow).spinner({
    max: 99999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_etiquetas')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "idfamilia" == specificField) {
    scJQSelect2Add_idfamilia(seqRow);
  }
  if (null == specificField || "tipo_letra" == specificField) {
    scJQSelect2Add_tipo_letra(seqRow);
  }
  if (null == specificField || "tipo_codigo" == specificField) {
    scJQSelect2Add_tipo_codigo(seqRow);
  }
  if (null == specificField || "tipo_imagen" == specificField) {
    scJQSelect2Add_tipo_imagen(seqRow);
  }
  if (null == specificField || "precio" == specificField) {
    scJQSelect2Add_precio(seqRow);
  }
  if (null == specificField || "alineacion" == specificField) {
    scJQSelect2Add_alineacion(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_idfamilia(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idfamilia_obj" : "#id_sc_field_idfamilia" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idfamilia_obj',
      dropdownCssClass: 'css_idfamilia_obj',
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

function scJQSelect2Add_tipo_letra(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_letra_obj" : "#id_sc_field_tipo_letra" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_letra_obj',
      dropdownCssClass: 'css_tipo_letra_obj',
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

function scJQSelect2Add_tipo_codigo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_codigo_obj" : "#id_sc_field_tipo_codigo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_codigo_obj',
      dropdownCssClass: 'css_tipo_codigo_obj',
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

function scJQSelect2Add_tipo_imagen(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_imagen_obj" : "#id_sc_field_tipo_imagen" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_imagen_obj',
      dropdownCssClass: 'css_tipo_imagen_obj',
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

function scJQSelect2Add_precio(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_precio_obj" : "#id_sc_field_precio" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_precio_obj',
      dropdownCssClass: 'css_precio_obj',
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

function scJQSelect2Add_alineacion(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_alineacion_obj" : "#id_sc_field_alineacion" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_alineacion_obj',
      dropdownCssClass: 'css_alineacion_obj',
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
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_idfamilia) { displayChange_field_idfamilia(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_letra) { displayChange_field_tipo_letra(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_codigo) { displayChange_field_tipo_codigo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_imagen) { displayChange_field_tipo_imagen(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_precio) { displayChange_field_precio(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_alineacion) { displayChange_field_alineacion(iLine, "on"); } }, 150);
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

