
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
      case 'lineasporfactura':
      case 'consolidararticulos':
      case 'serial':
      case 'fecha':
      case 'activo':
      case 'espaciado':
      case 'caja_movil':
      case 'pago_automatico':
      case 'dia_limite_pago':
      case 'refresh_grid_doc':
      case 'desactivar_control_sesion':
      case 'nombre_pc':
      case 'nombre_impre':
        sc_exib_ocult_pag('form_configuraciones_form0');
        break;
      case 'essociedad':
      case 'grancontr':
      case 'idconfiguraciones':
        sc_exib_ocult_pag('form_configuraciones_form1');
        break;
      case 'control_diasmora':
      case 'control_costo':
      case 'modificainvpedido':
      case 'tipodoc_pordefecto_pos':
      case 'ver_xml_fe':
      case 'noborrar_tmp_enpos':
      case 'validar_correo_enlinea':
      case 'apertura_caja':
      case 'activar_console_log':
      case 'codproducto_en_facventa':
      case 'valor_propina_sugerida':
      case 'columna_imprimir_ticket':
      case 'columna_imprimir_a4':
      case 'columna_whatsapp':
      case 'columna_npedido':
      case 'columna_reg_pdf_propio':
      case 'ver_busqueda_refinada':
        sc_exib_ocult_pag('form_configuraciones_form2');
        break;
      case 'ver_grupo':
      case 'ver_codigo':
      case 'ver_imagen':
      case 'ver_existencia':
      case 'ver_unidad':
      case 'ver_precio':
      case 'ver_impuesto':
      case 'ver_stock':
      case 'ver_ubicacion':
      case 'ver_costo':
      case 'ver_proveedor':
      case 'ver_combo':
      case 'ver_agregar_nota':
        sc_exib_ocult_pag('form_configuraciones_form3');
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
  scEventControl_data["lineasporfactura" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consolidararticulos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["espaciado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["caja_movil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pago_automatico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dia_limite_pago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["refresh_grid_doc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desactivar_control_sesion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_pc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_impre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["essociedad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["grancontr" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idconfiguraciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["control_diasmora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["control_costo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modificainvpedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipodoc_pordefecto_pos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_xml_fe" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["noborrar_tmp_enpos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["validar_correo_enlinea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apertura_caja" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activar_console_log" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codproducto_en_facventa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_propina_sugerida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["columna_imprimir_ticket" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["columna_imprimir_a4" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["columna_whatsapp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["columna_npedido" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["columna_reg_pdf_propio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_busqueda_refinada" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_grupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_codigo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_imagen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_existencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_unidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_precio" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_impuesto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_stock" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_ubicacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_costo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_proveedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_combo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ver_agregar_nota" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["lineasporfactura" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lineasporfactura" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consolidararticulos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consolidararticulos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["espaciado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["espaciado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["caja_movil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["caja_movil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pago_automatico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pago_automatico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dia_limite_pago" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dia_limite_pago" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["refresh_grid_doc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["refresh_grid_doc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desactivar_control_sesion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desactivar_control_sesion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_impre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_impre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["essociedad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["essociedad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["grancontr" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["grancontr" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idconfiguraciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idconfiguraciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["control_diasmora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["control_diasmora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["control_costo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["control_costo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["modificainvpedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["modificainvpedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipodoc_pordefecto_pos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipodoc_pordefecto_pos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_xml_fe" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_xml_fe" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["noborrar_tmp_enpos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["noborrar_tmp_enpos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["validar_correo_enlinea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["validar_correo_enlinea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apertura_caja" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apertura_caja" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activar_console_log" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activar_console_log" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codproducto_en_facventa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codproducto_en_facventa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_propina_sugerida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_propina_sugerida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["columna_imprimir_ticket" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["columna_imprimir_ticket" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["columna_imprimir_a4" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["columna_imprimir_a4" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["columna_whatsapp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["columna_whatsapp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["columna_npedido" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["columna_npedido" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["columna_reg_pdf_propio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["columna_reg_pdf_propio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_busqueda_refinada" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_busqueda_refinada" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_grupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_grupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_codigo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_codigo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_imagen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_imagen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_existencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_existencia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_unidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_unidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_precio" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_precio" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_impuesto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_impuesto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_stock" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_stock" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_ubicacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_ubicacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_costo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_costo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_proveedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_proveedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_combo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_combo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ver_agregar_nota" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ver_agregar_nota" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("consolidararticulos" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipodoc_pordefecto_pos" + iSeq == fieldName) {
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
  $('#id_sc_field_idconfiguraciones' + iSeqRow).bind('blur', function() { sc_form_configuraciones_idconfiguraciones_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_configuraciones_idconfiguraciones_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_configuraciones_idconfiguraciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_lineasporfactura' + iSeqRow).bind('blur', function() { sc_form_configuraciones_lineasporfactura_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_configuraciones_lineasporfactura_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_configuraciones_lineasporfactura_onfocus(this, iSeqRow) });
  $('#id_sc_field_consolidararticulos' + iSeqRow).bind('blur', function() { sc_form_configuraciones_consolidararticulos_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_configuraciones_consolidararticulos_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_configuraciones_consolidararticulos_onfocus(this, iSeqRow) });
  $('#id_sc_field_serial' + iSeqRow).bind('blur', function() { sc_form_configuraciones_serial_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_configuraciones_serial_onchange(this, iSeqRow) })
                                    .bind('click', function() { sc_form_configuraciones_serial_onclick(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_configuraciones_serial_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha' + iSeqRow).bind('blur', function() { sc_form_configuraciones_fecha_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_configuraciones_fecha_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_configuraciones_fecha_onfocus(this, iSeqRow) });
  $('#id_sc_field_ultima_edicion' + iSeqRow).bind('change', function() { sc_form_configuraciones_ultima_edicion_onchange(this, iSeqRow) });
  $('#id_sc_field_ultima_edicion_hora' + iSeqRow).bind('change', function() { sc_form_configuraciones_ultima_edicion_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_configuraciones_activo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_configuraciones_activo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_configuraciones_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_espaciado' + iSeqRow).bind('blur', function() { sc_form_configuraciones_espaciado_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_espaciado_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_espaciado_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_pc' + iSeqRow).bind('blur', function() { sc_form_configuraciones_nombre_pc_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_nombre_pc_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_nombre_pc_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_impre' + iSeqRow).bind('blur', function() { sc_form_configuraciones_nombre_impre_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_configuraciones_nombre_impre_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_configuraciones_nombre_impre_onfocus(this, iSeqRow) });
  $('#id_sc_field_ruta_bd_tns' + iSeqRow).bind('change', function() { sc_form_configuraciones_ruta_bd_tns_onchange(this, iSeqRow) });
  $('#id_sc_field_ip' + iSeqRow).bind('change', function() { sc_form_configuraciones_ip_onchange(this, iSeqRow) });
  $('#id_sc_field_refresh_grid_doc' + iSeqRow).bind('blur', function() { sc_form_configuraciones_refresh_grid_doc_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_configuraciones_refresh_grid_doc_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_configuraciones_refresh_grid_doc_onfocus(this, iSeqRow) });
  $('#id_sc_field_modificainvpedido' + iSeqRow).bind('blur', function() { sc_form_configuraciones_modificainvpedido_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_configuraciones_modificainvpedido_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_configuraciones_modificainvpedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_caja_movil' + iSeqRow).bind('blur', function() { sc_form_configuraciones_caja_movil_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_caja_movil_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_caja_movil_onfocus(this, iSeqRow) });
  $('#id_sc_field_integrar_tns' + iSeqRow).bind('change', function() { sc_form_configuraciones_integrar_tns_onchange(this, iSeqRow) });
  $('#id_sc_field_essociedad' + iSeqRow).bind('blur', function() { sc_form_configuraciones_essociedad_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_essociedad_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_essociedad_onfocus(this, iSeqRow) });
  $('#id_sc_field_grancontr' + iSeqRow).bind('blur', function() { sc_form_configuraciones_grancontr_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_grancontr_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_grancontr_onfocus(this, iSeqRow) });
  $('#id_sc_field_apertura_caja' + iSeqRow).bind('blur', function() { sc_form_configuraciones_apertura_caja_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_configuraciones_apertura_caja_onchange(this, iSeqRow) })
                                           .bind('click', function() { sc_form_configuraciones_apertura_caja_onclick(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_configuraciones_apertura_caja_onfocus(this, iSeqRow) });
  $('#id_sc_field_control_diasmora' + iSeqRow).bind('blur', function() { sc_form_configuraciones_control_diasmora_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_configuraciones_control_diasmora_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_configuraciones_control_diasmora_onfocus(this, iSeqRow) });
  $('#id_sc_field_control_costo' + iSeqRow).bind('blur', function() { sc_form_configuraciones_control_costo_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_configuraciones_control_costo_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_configuraciones_control_costo_onfocus(this, iSeqRow) });
  $('#id_sc_field_activar_console_log' + iSeqRow).bind('blur', function() { sc_form_configuraciones_activar_console_log_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_configuraciones_activar_console_log_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_configuraciones_activar_console_log_onfocus(this, iSeqRow) });
  $('#id_sc_field_pago_automatico' + iSeqRow).bind('blur', function() { sc_form_configuraciones_pago_automatico_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_configuraciones_pago_automatico_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_configuraciones_pago_automatico_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipodoc_pordefecto_pos' + iSeqRow).bind('blur', function() { sc_form_configuraciones_tipodoc_pordefecto_pos_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_configuraciones_tipodoc_pordefecto_pos_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_configuraciones_tipodoc_pordefecto_pos_onfocus(this, iSeqRow) });
  $('#id_sc_field_nube_pedidos' + iSeqRow).bind('change', function() { sc_form_configuraciones_nube_pedidos_onchange(this, iSeqRow) });
  $('#id_sc_field_nube_inventario' + iSeqRow).bind('change', function() { sc_form_configuraciones_nube_inventario_onchange(this, iSeqRow) });
  $('#id_sc_field_nube_cartera' + iSeqRow).bind('change', function() { sc_form_configuraciones_nube_cartera_onchange(this, iSeqRow) });
  $('#id_sc_field_nube_tesoreria' + iSeqRow).bind('change', function() { sc_form_configuraciones_nube_tesoreria_onchange(this, iSeqRow) });
  $('#id_sc_field_nube_agenda' + iSeqRow).bind('change', function() { sc_form_configuraciones_nube_agenda_onchange(this, iSeqRow) });
  $('#id_sc_field_nube_compras' + iSeqRow).bind('change', function() { sc_form_configuraciones_nube_compras_onchange(this, iSeqRow) });
  $('#id_sc_field_nube_codigo' + iSeqRow).bind('change', function() { sc_form_configuraciones_nube_codigo_onchange(this, iSeqRow) });
  $('#id_sc_field_token' + iSeqRow).bind('change', function() { sc_form_configuraciones_token_onchange(this, iSeqRow) });
  $('#id_sc_field_password' + iSeqRow).bind('change', function() { sc_form_configuraciones_password_onchange(this, iSeqRow) });
  $('#id_sc_field_codproducto_en_facventa' + iSeqRow).bind('blur', function() { sc_form_configuraciones_codproducto_en_facventa_onblur(this, iSeqRow) })
                                                     .bind('change', function() { sc_form_configuraciones_codproducto_en_facventa_onchange(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_configuraciones_codproducto_en_facventa_onfocus(this, iSeqRow) });
  $('#id_sc_field_habilitar_comprobantes' + iSeqRow).bind('change', function() { sc_form_configuraciones_habilitar_comprobantes_onchange(this, iSeqRow) });
  $('#id_sc_field_noborrar_tmp_enpos' + iSeqRow).bind('blur', function() { sc_form_configuraciones_noborrar_tmp_enpos_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_configuraciones_noborrar_tmp_enpos_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_configuraciones_noborrar_tmp_enpos_onfocus(this, iSeqRow) });
  $('#id_sc_field_desactivar_control_sesion' + iSeqRow).bind('blur', function() { sc_form_configuraciones_desactivar_control_sesion_onblur(this, iSeqRow) })
                                                       .bind('change', function() { sc_form_configuraciones_desactivar_control_sesion_onchange(this, iSeqRow) })
                                                       .bind('focus', function() { sc_form_configuraciones_desactivar_control_sesion_onfocus(this, iSeqRow) });
  $('#id_sc_field_dia_limite_pago' + iSeqRow).bind('blur', function() { sc_form_configuraciones_dia_limite_pago_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_configuraciones_dia_limite_pago_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_configuraciones_dia_limite_pago_onfocus(this, iSeqRow) });
  $('#id_sc_field_licencia_activa' + iSeqRow).bind('change', function() { sc_form_configuraciones_licencia_activa_onchange(this, iSeqRow) });
  $('#id_sc_field_fecha_activacion' + iSeqRow).bind('change', function() { sc_form_configuraciones_fecha_activacion_onchange(this, iSeqRow) });
  $('#id_sc_field_fecha_activacion_hora' + iSeqRow).bind('change', function() { sc_form_configuraciones_fecha_activacion_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_cod_cliente' + iSeqRow).bind('change', function() { sc_form_configuraciones_cod_cliente_onchange(this, iSeqRow) });
  $('#id_sc_field_valor_propina_sugerida' + iSeqRow).bind('blur', function() { sc_form_configuraciones_valor_propina_sugerida_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_configuraciones_valor_propina_sugerida_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_configuraciones_valor_propina_sugerida_onfocus(this, iSeqRow) });
  $('#id_sc_field_validar_correo_enlinea' + iSeqRow).bind('blur', function() { sc_form_configuraciones_validar_correo_enlinea_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_configuraciones_validar_correo_enlinea_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_configuraciones_validar_correo_enlinea_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_xml_fe' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_xml_fe_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_ver_xml_fe_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_ver_xml_fe_onfocus(this, iSeqRow) });
  $('#id_sc_field_columna_imprimir_ticket' + iSeqRow).bind('blur', function() { sc_form_configuraciones_columna_imprimir_ticket_onblur(this, iSeqRow) })
                                                     .bind('change', function() { sc_form_configuraciones_columna_imprimir_ticket_onchange(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_configuraciones_columna_imprimir_ticket_onfocus(this, iSeqRow) });
  $('#id_sc_field_columna_imprimir_a4' + iSeqRow).bind('blur', function() { sc_form_configuraciones_columna_imprimir_a4_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_configuraciones_columna_imprimir_a4_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_configuraciones_columna_imprimir_a4_onfocus(this, iSeqRow) });
  $('#id_sc_field_columna_whatsapp' + iSeqRow).bind('blur', function() { sc_form_configuraciones_columna_whatsapp_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_configuraciones_columna_whatsapp_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_configuraciones_columna_whatsapp_onfocus(this, iSeqRow) });
  $('#id_sc_field_columna_npedido' + iSeqRow).bind('blur', function() { sc_form_configuraciones_columna_npedido_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_configuraciones_columna_npedido_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_configuraciones_columna_npedido_onfocus(this, iSeqRow) });
  $('#id_sc_field_columna_reg_pdf_propio' + iSeqRow).bind('blur', function() { sc_form_configuraciones_columna_reg_pdf_propio_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_configuraciones_columna_reg_pdf_propio_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_configuraciones_columna_reg_pdf_propio_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_grupo' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_grupo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_ver_grupo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_ver_grupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_codigo' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_codigo_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_ver_codigo_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_ver_codigo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_imagen' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_imagen_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_ver_imagen_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_ver_imagen_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_existencia' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_existencia_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_configuraciones_ver_existencia_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_configuraciones_ver_existencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_unidad' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_unidad_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_ver_unidad_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_ver_unidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_precio' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_precio_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_configuraciones_ver_precio_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_configuraciones_ver_precio_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_impuesto' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_impuesto_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_configuraciones_ver_impuesto_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_configuraciones_ver_impuesto_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_stock' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_stock_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_ver_stock_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_ver_stock_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_ubicacion' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_ubicacion_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_configuraciones_ver_ubicacion_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_configuraciones_ver_ubicacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_costo' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_costo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_ver_costo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_ver_costo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_proveedor' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_proveedor_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_configuraciones_ver_proveedor_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_configuraciones_ver_proveedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_combo' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_combo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_configuraciones_ver_combo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_configuraciones_ver_combo_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_agregar_nota' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_agregar_nota_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_configuraciones_ver_agregar_nota_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_configuraciones_ver_agregar_nota_onfocus(this, iSeqRow) });
  $('#id_sc_field_ver_busqueda_refinada' + iSeqRow).bind('blur', function() { sc_form_configuraciones_ver_busqueda_refinada_onblur(this, iSeqRow) })
                                                   .bind('change', function() { sc_form_configuraciones_ver_busqueda_refinada_onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_configuraciones_ver_busqueda_refinada_onfocus(this, iSeqRow) });
  $('#id_sc_field_probarnube' + iSeqRow).bind('change', function() { sc_form_configuraciones_probarnube_onchange(this, iSeqRow) });
  $('.sc-ui-checkbox-caja_movil' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-pago_automatico' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-desactivar_control_sesion' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-essociedad' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-grancontr' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-control_diasmora' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-control_costo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-modificainvpedido' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_xml_fe' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-noborrar_tmp_enpos' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-validar_correo_enlinea' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-apertura_caja' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-activar_console_log' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-codproducto_en_facventa' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-columna_imprimir_ticket' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-columna_imprimir_a4' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-columna_whatsapp' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-columna_npedido' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-columna_reg_pdf_propio' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_busqueda_refinada' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_grupo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_codigo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_imagen' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_existencia' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_unidad' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_precio' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_impuesto' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_stock' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_ubicacion' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_costo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_proveedor' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_combo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-ver_agregar_nota' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-integrar_tns' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-nube_pedidos' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-nube_inventario' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-nube_cartera' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-nube_tesoreria' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-nube_agenda' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-nube_compras' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-habilitar_comprobantes' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_configuraciones_idconfiguraciones_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_idconfiguraciones();
  scCssBlur(oThis);
}

function sc_form_configuraciones_idconfiguraciones_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_idconfiguraciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_lineasporfactura_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_lineasporfactura();
  scCssBlur(oThis);
}

function sc_form_configuraciones_lineasporfactura_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_lineasporfactura_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_consolidararticulos_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_consolidararticulos();
  scCssBlur(oThis);
}

function sc_form_configuraciones_consolidararticulos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_consolidararticulos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_serial_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_serial();
  scCssBlur(oThis);
}

function sc_form_configuraciones_serial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_serial_onclick(oThis, iSeqRow) {
  do_ajax_form_configuraciones_event_serial_onclick();
}

function sc_form_configuraciones_serial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
  do_ajax_form_configuraciones_event_serial_onfocus();
}

function sc_form_configuraciones_fecha_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_fecha();
  scCssBlur(oThis);
}

function sc_form_configuraciones_fecha_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_fecha_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ultima_edicion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ultima_edicion_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_activo();
  scCssBlur(oThis);
}

function sc_form_configuraciones_activo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_espaciado_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_espaciado();
  scCssBlur(oThis);
}

function sc_form_configuraciones_espaciado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_espaciado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_nombre_pc_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_nombre_pc();
  scCssBlur(oThis);
}

function sc_form_configuraciones_nombre_pc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nombre_pc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_nombre_impre_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_nombre_impre();
  scCssBlur(oThis);
}

function sc_form_configuraciones_nombre_impre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nombre_impre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ruta_bd_tns_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ip_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_refresh_grid_doc_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_refresh_grid_doc();
  scCssBlur(oThis);
}

function sc_form_configuraciones_refresh_grid_doc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_refresh_grid_doc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_modificainvpedido_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_modificainvpedido();
  scCssBlur(oThis);
}

function sc_form_configuraciones_modificainvpedido_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_modificainvpedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_caja_movil_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_caja_movil();
  scCssBlur(oThis);
}

function sc_form_configuraciones_caja_movil_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_caja_movil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_integrar_tns_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_essociedad_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_essociedad();
  scCssBlur(oThis);
}

function sc_form_configuraciones_essociedad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_essociedad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_grancontr_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_grancontr();
  scCssBlur(oThis);
}

function sc_form_configuraciones_grancontr_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_grancontr_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_apertura_caja_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_apertura_caja();
  scCssBlur(oThis);
}

function sc_form_configuraciones_apertura_caja_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_apertura_caja_onclick(oThis, iSeqRow) {
  do_ajax_form_configuraciones_event_apertura_caja_onclick();
}

function sc_form_configuraciones_apertura_caja_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_control_diasmora_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_control_diasmora();
  scCssBlur(oThis);
}

function sc_form_configuraciones_control_diasmora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_control_diasmora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_control_costo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_control_costo();
  scCssBlur(oThis);
}

function sc_form_configuraciones_control_costo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_control_costo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_activar_console_log_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_activar_console_log();
  scCssBlur(oThis);
}

function sc_form_configuraciones_activar_console_log_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_activar_console_log_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_pago_automatico_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_pago_automatico();
  scCssBlur(oThis);
}

function sc_form_configuraciones_pago_automatico_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_pago_automatico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_tipodoc_pordefecto_pos_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_tipodoc_pordefecto_pos();
  scCssBlur(oThis);
}

function sc_form_configuraciones_tipodoc_pordefecto_pos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_tipodoc_pordefecto_pos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_nube_pedidos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nube_inventario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nube_cartera_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nube_tesoreria_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nube_agenda_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nube_compras_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_nube_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_token_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_password_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_codproducto_en_facventa_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_codproducto_en_facventa();
  scCssBlur(oThis);
}

function sc_form_configuraciones_codproducto_en_facventa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_codproducto_en_facventa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_habilitar_comprobantes_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_noborrar_tmp_enpos_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_noborrar_tmp_enpos();
  scCssBlur(oThis);
}

function sc_form_configuraciones_noborrar_tmp_enpos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_noborrar_tmp_enpos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_desactivar_control_sesion_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_desactivar_control_sesion();
  scCssBlur(oThis);
}

function sc_form_configuraciones_desactivar_control_sesion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_desactivar_control_sesion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_dia_limite_pago_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_dia_limite_pago();
  scCssBlur(oThis);
}

function sc_form_configuraciones_dia_limite_pago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_dia_limite_pago_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_licencia_activa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_fecha_activacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_fecha_activacion_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_cod_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_valor_propina_sugerida_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_valor_propina_sugerida();
  scCssBlur(oThis);
}

function sc_form_configuraciones_valor_propina_sugerida_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_valor_propina_sugerida_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_validar_correo_enlinea_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_validar_correo_enlinea();
  scCssBlur(oThis);
}

function sc_form_configuraciones_validar_correo_enlinea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_validar_correo_enlinea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_xml_fe_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_xml_fe();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_xml_fe_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_xml_fe_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_columna_imprimir_ticket_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_columna_imprimir_ticket();
  scCssBlur(oThis);
}

function sc_form_configuraciones_columna_imprimir_ticket_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_columna_imprimir_ticket_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_columna_imprimir_a4_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_columna_imprimir_a4();
  scCssBlur(oThis);
}

function sc_form_configuraciones_columna_imprimir_a4_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_columna_imprimir_a4_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_columna_whatsapp_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_columna_whatsapp();
  scCssBlur(oThis);
}

function sc_form_configuraciones_columna_whatsapp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_columna_whatsapp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_columna_npedido_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_columna_npedido();
  scCssBlur(oThis);
}

function sc_form_configuraciones_columna_npedido_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_columna_npedido_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_columna_reg_pdf_propio_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_columna_reg_pdf_propio();
  scCssBlur(oThis);
}

function sc_form_configuraciones_columna_reg_pdf_propio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_columna_reg_pdf_propio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_grupo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_grupo();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_grupo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_grupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_codigo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_codigo();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_codigo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_codigo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_imagen_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_imagen();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_imagen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_imagen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_existencia_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_existencia();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_existencia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_existencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_unidad_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_unidad();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_unidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_unidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_precio_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_precio();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_precio_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_precio_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_impuesto_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_impuesto();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_impuesto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_impuesto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_stock_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_stock();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_stock_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_stock_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_ubicacion_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_ubicacion();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_ubicacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_ubicacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_costo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_costo();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_costo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_costo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_proveedor_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_proveedor();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_proveedor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_proveedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_combo_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_combo();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_combo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_combo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_agregar_nota_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_agregar_nota();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_agregar_nota_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_agregar_nota_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_ver_busqueda_refinada_onblur(oThis, iSeqRow) {
  do_ajax_form_configuraciones_validate_ver_busqueda_refinada();
  scCssBlur(oThis);
}

function sc_form_configuraciones_ver_busqueda_refinada_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_configuraciones_ver_busqueda_refinada_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_configuraciones_probarnube_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
	if ("2" == page) {
		displayChange_page_2(status);
	}
	if ("3" == page) {
		displayChange_page_3(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
}

function displayChange_page_1(status) {
	displayChange_block("2", status);
}

function displayChange_page_2(status) {
	displayChange_block("3", status);
}

function displayChange_page_3(status) {
	displayChange_block("4", status);
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
	if ("3" == block) {
		displayChange_block_3(status);
	}
	if ("4" == block) {
		displayChange_block_4(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("lineasporfactura", "", status);
	displayChange_field("consolidararticulos", "", status);
	displayChange_field("serial", "", status);
	displayChange_field("fecha", "", status);
	displayChange_field("activo", "", status);
	displayChange_field("espaciado", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("caja_movil", "", status);
	displayChange_field("pago_automatico", "", status);
	displayChange_field("dia_limite_pago", "", status);
	displayChange_field("refresh_grid_doc", "", status);
	displayChange_field("desactivar_control_sesion", "", status);
	displayChange_field("nombre_pc", "", status);
	displayChange_field("nombre_impre", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("essociedad", "", status);
	displayChange_field("grancontr", "", status);
	displayChange_field("idconfiguraciones", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("control_diasmora", "", status);
	displayChange_field("control_costo", "", status);
	displayChange_field("modificainvpedido", "", status);
	displayChange_field("tipodoc_pordefecto_pos", "", status);
	displayChange_field("ver_xml_fe", "", status);
	displayChange_field("noborrar_tmp_enpos", "", status);
	displayChange_field("validar_correo_enlinea", "", status);
	displayChange_field("apertura_caja", "", status);
	displayChange_field("activar_console_log", "", status);
	displayChange_field("codproducto_en_facventa", "", status);
	displayChange_field("valor_propina_sugerida", "", status);
	displayChange_field("columna_imprimir_ticket", "", status);
	displayChange_field("columna_imprimir_a4", "", status);
	displayChange_field("columna_whatsapp", "", status);
	displayChange_field("columna_npedido", "", status);
	displayChange_field("columna_reg_pdf_propio", "", status);
	displayChange_field("ver_busqueda_refinada", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("ver_grupo", "", status);
	displayChange_field("ver_codigo", "", status);
	displayChange_field("ver_imagen", "", status);
	displayChange_field("ver_existencia", "", status);
	displayChange_field("ver_unidad", "", status);
	displayChange_field("ver_precio", "", status);
	displayChange_field("ver_impuesto", "", status);
	displayChange_field("ver_stock", "", status);
	displayChange_field("ver_ubicacion", "", status);
	displayChange_field("ver_costo", "", status);
	displayChange_field("ver_proveedor", "", status);
	displayChange_field("ver_combo", "", status);
	displayChange_field("ver_agregar_nota", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_lineasporfactura(row, status);
	displayChange_field_consolidararticulos(row, status);
	displayChange_field_serial(row, status);
	displayChange_field_fecha(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_espaciado(row, status);
	displayChange_field_caja_movil(row, status);
	displayChange_field_pago_automatico(row, status);
	displayChange_field_dia_limite_pago(row, status);
	displayChange_field_refresh_grid_doc(row, status);
	displayChange_field_desactivar_control_sesion(row, status);
	displayChange_field_nombre_pc(row, status);
	displayChange_field_nombre_impre(row, status);
	displayChange_field_essociedad(row, status);
	displayChange_field_grancontr(row, status);
	displayChange_field_idconfiguraciones(row, status);
	displayChange_field_control_diasmora(row, status);
	displayChange_field_control_costo(row, status);
	displayChange_field_modificainvpedido(row, status);
	displayChange_field_tipodoc_pordefecto_pos(row, status);
	displayChange_field_ver_xml_fe(row, status);
	displayChange_field_noborrar_tmp_enpos(row, status);
	displayChange_field_validar_correo_enlinea(row, status);
	displayChange_field_apertura_caja(row, status);
	displayChange_field_activar_console_log(row, status);
	displayChange_field_codproducto_en_facventa(row, status);
	displayChange_field_valor_propina_sugerida(row, status);
	displayChange_field_columna_imprimir_ticket(row, status);
	displayChange_field_columna_imprimir_a4(row, status);
	displayChange_field_columna_whatsapp(row, status);
	displayChange_field_columna_npedido(row, status);
	displayChange_field_columna_reg_pdf_propio(row, status);
	displayChange_field_ver_busqueda_refinada(row, status);
	displayChange_field_ver_grupo(row, status);
	displayChange_field_ver_codigo(row, status);
	displayChange_field_ver_imagen(row, status);
	displayChange_field_ver_existencia(row, status);
	displayChange_field_ver_unidad(row, status);
	displayChange_field_ver_precio(row, status);
	displayChange_field_ver_impuesto(row, status);
	displayChange_field_ver_stock(row, status);
	displayChange_field_ver_ubicacion(row, status);
	displayChange_field_ver_costo(row, status);
	displayChange_field_ver_proveedor(row, status);
	displayChange_field_ver_combo(row, status);
	displayChange_field_ver_agregar_nota(row, status);
}

function displayChange_field(field, row, status) {
	if ("lineasporfactura" == field) {
		displayChange_field_lineasporfactura(row, status);
	}
	if ("consolidararticulos" == field) {
		displayChange_field_consolidararticulos(row, status);
	}
	if ("serial" == field) {
		displayChange_field_serial(row, status);
	}
	if ("fecha" == field) {
		displayChange_field_fecha(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("espaciado" == field) {
		displayChange_field_espaciado(row, status);
	}
	if ("caja_movil" == field) {
		displayChange_field_caja_movil(row, status);
	}
	if ("pago_automatico" == field) {
		displayChange_field_pago_automatico(row, status);
	}
	if ("dia_limite_pago" == field) {
		displayChange_field_dia_limite_pago(row, status);
	}
	if ("refresh_grid_doc" == field) {
		displayChange_field_refresh_grid_doc(row, status);
	}
	if ("desactivar_control_sesion" == field) {
		displayChange_field_desactivar_control_sesion(row, status);
	}
	if ("nombre_pc" == field) {
		displayChange_field_nombre_pc(row, status);
	}
	if ("nombre_impre" == field) {
		displayChange_field_nombre_impre(row, status);
	}
	if ("essociedad" == field) {
		displayChange_field_essociedad(row, status);
	}
	if ("grancontr" == field) {
		displayChange_field_grancontr(row, status);
	}
	if ("idconfiguraciones" == field) {
		displayChange_field_idconfiguraciones(row, status);
	}
	if ("control_diasmora" == field) {
		displayChange_field_control_diasmora(row, status);
	}
	if ("control_costo" == field) {
		displayChange_field_control_costo(row, status);
	}
	if ("modificainvpedido" == field) {
		displayChange_field_modificainvpedido(row, status);
	}
	if ("tipodoc_pordefecto_pos" == field) {
		displayChange_field_tipodoc_pordefecto_pos(row, status);
	}
	if ("ver_xml_fe" == field) {
		displayChange_field_ver_xml_fe(row, status);
	}
	if ("noborrar_tmp_enpos" == field) {
		displayChange_field_noborrar_tmp_enpos(row, status);
	}
	if ("validar_correo_enlinea" == field) {
		displayChange_field_validar_correo_enlinea(row, status);
	}
	if ("apertura_caja" == field) {
		displayChange_field_apertura_caja(row, status);
	}
	if ("activar_console_log" == field) {
		displayChange_field_activar_console_log(row, status);
	}
	if ("codproducto_en_facventa" == field) {
		displayChange_field_codproducto_en_facventa(row, status);
	}
	if ("valor_propina_sugerida" == field) {
		displayChange_field_valor_propina_sugerida(row, status);
	}
	if ("columna_imprimir_ticket" == field) {
		displayChange_field_columna_imprimir_ticket(row, status);
	}
	if ("columna_imprimir_a4" == field) {
		displayChange_field_columna_imprimir_a4(row, status);
	}
	if ("columna_whatsapp" == field) {
		displayChange_field_columna_whatsapp(row, status);
	}
	if ("columna_npedido" == field) {
		displayChange_field_columna_npedido(row, status);
	}
	if ("columna_reg_pdf_propio" == field) {
		displayChange_field_columna_reg_pdf_propio(row, status);
	}
	if ("ver_busqueda_refinada" == field) {
		displayChange_field_ver_busqueda_refinada(row, status);
	}
	if ("ver_grupo" == field) {
		displayChange_field_ver_grupo(row, status);
	}
	if ("ver_codigo" == field) {
		displayChange_field_ver_codigo(row, status);
	}
	if ("ver_imagen" == field) {
		displayChange_field_ver_imagen(row, status);
	}
	if ("ver_existencia" == field) {
		displayChange_field_ver_existencia(row, status);
	}
	if ("ver_unidad" == field) {
		displayChange_field_ver_unidad(row, status);
	}
	if ("ver_precio" == field) {
		displayChange_field_ver_precio(row, status);
	}
	if ("ver_impuesto" == field) {
		displayChange_field_ver_impuesto(row, status);
	}
	if ("ver_stock" == field) {
		displayChange_field_ver_stock(row, status);
	}
	if ("ver_ubicacion" == field) {
		displayChange_field_ver_ubicacion(row, status);
	}
	if ("ver_costo" == field) {
		displayChange_field_ver_costo(row, status);
	}
	if ("ver_proveedor" == field) {
		displayChange_field_ver_proveedor(row, status);
	}
	if ("ver_combo" == field) {
		displayChange_field_ver_combo(row, status);
	}
	if ("ver_agregar_nota" == field) {
		displayChange_field_ver_agregar_nota(row, status);
	}
}

function displayChange_field_lineasporfactura(row, status) {
}

function displayChange_field_consolidararticulos(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_consolidararticulos__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_consolidararticulos" + row).select2("destroy");
		}
		scJQSelect2Add(row, "consolidararticulos");
	}
}

function displayChange_field_serial(row, status) {
}

function displayChange_field_fecha(row, status) {
}

function displayChange_field_activo(row, status) {
}

function displayChange_field_espaciado(row, status) {
}

function displayChange_field_caja_movil(row, status) {
}

function displayChange_field_pago_automatico(row, status) {
}

function displayChange_field_dia_limite_pago(row, status) {
}

function displayChange_field_refresh_grid_doc(row, status) {
}

function displayChange_field_desactivar_control_sesion(row, status) {
}

function displayChange_field_nombre_pc(row, status) {
}

function displayChange_field_nombre_impre(row, status) {
}

function displayChange_field_essociedad(row, status) {
}

function displayChange_field_grancontr(row, status) {
}

function displayChange_field_idconfiguraciones(row, status) {
}

function displayChange_field_control_diasmora(row, status) {
}

function displayChange_field_control_costo(row, status) {
}

function displayChange_field_modificainvpedido(row, status) {
}

function displayChange_field_tipodoc_pordefecto_pos(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipodoc_pordefecto_pos__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipodoc_pordefecto_pos" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipodoc_pordefecto_pos");
	}
}

function displayChange_field_ver_xml_fe(row, status) {
}

function displayChange_field_noborrar_tmp_enpos(row, status) {
}

function displayChange_field_validar_correo_enlinea(row, status) {
}

function displayChange_field_apertura_caja(row, status) {
}

function displayChange_field_activar_console_log(row, status) {
}

function displayChange_field_codproducto_en_facventa(row, status) {
}

function displayChange_field_valor_propina_sugerida(row, status) {
}

function displayChange_field_columna_imprimir_ticket(row, status) {
}

function displayChange_field_columna_imprimir_a4(row, status) {
}

function displayChange_field_columna_whatsapp(row, status) {
}

function displayChange_field_columna_npedido(row, status) {
}

function displayChange_field_columna_reg_pdf_propio(row, status) {
}

function displayChange_field_ver_busqueda_refinada(row, status) {
}

function displayChange_field_ver_grupo(row, status) {
}

function displayChange_field_ver_codigo(row, status) {
}

function displayChange_field_ver_imagen(row, status) {
}

function displayChange_field_ver_existencia(row, status) {
}

function displayChange_field_ver_unidad(row, status) {
}

function displayChange_field_ver_precio(row, status) {
}

function displayChange_field_ver_impuesto(row, status) {
}

function displayChange_field_ver_stock(row, status) {
}

function displayChange_field_ver_ubicacion(row, status) {
}

function displayChange_field_ver_costo(row, status) {
}

function displayChange_field_ver_proveedor(row, status) {
}

function displayChange_field_ver_combo(row, status) {
}

function displayChange_field_ver_agregar_nota(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_consolidararticulos("all", "on");
	displayChange_field_tipodoc_pordefecto_pos("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_configuraciones_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_ultima_edicion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_ultima_edicion" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['ultima_edicion']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultima_edicion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_configuraciones_validate_ultima_edicion(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['ultima_edicion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_fecha_activacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_activacion" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_activacion']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_activacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_configuraciones_validate_fecha_activacion(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_activacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQPopupAdd(iSeqRow) {
  $('.scFormPopupBubble' + iSeqRow).each(function() {
    var distance = 10;
    var time = 250;
    var hideDelay = 500;
    var hideDelayTimer = null;
    var beingShown = false;
    var shown = false;
    var trigger = $('.scFormPopupTrigger', this);
    var info = $('.scFormPopup', this).css('opacity', 0);
    $([trigger.get(0), info.get(0)]).mouseover(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      if (beingShown || shown) {
        // don't trigger the animation again
        return;
      } else {
        // reset position of info box
        beingShown = true;
        info.css({
          top: trigger.offset().top - (info.height() - trigger.height()),
          left: trigger.offset().left - ((info.width() - trigger.width()) / 2),
          display: 'block'
        }).animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          beingShown = false;
          shown = true;
        });
      }
      return false;
      }).mouseout(function() {
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      hideDelayTimer = setTimeout(function() {
        hideDelayTimer = null;
        info.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function() {
          shown = false;
          info.css('display', 'none');
        });
      }, hideDelay);
      return false;
    });
  });
} // scJQPopupAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_configuraciones')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "consolidararticulos" == specificField) {
    scJQSelect2Add_consolidararticulos(seqRow);
  }
  if (null == specificField || "tipodoc_pordefecto_pos" == specificField) {
    scJQSelect2Add_tipodoc_pordefecto_pos(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_consolidararticulos(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_consolidararticulos_obj" : "#id_sc_field_consolidararticulos" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_consolidararticulos_obj',
      dropdownCssClass: 'css_consolidararticulos_obj',
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

function scJQSelect2Add_tipodoc_pordefecto_pos(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipodoc_pordefecto_pos_obj" : "#id_sc_field_tipodoc_pordefecto_pos" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipodoc_pordefecto_pos_obj',
      dropdownCssClass: 'css_tipodoc_pordefecto_pos_obj',
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
  scJQCalendarAdd(iLine);
  scJQPopupAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_consolidararticulos) { displayChange_field_consolidararticulos(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipodoc_pordefecto_pos) { displayChange_field_tipodoc_pordefecto_pos(iLine, "on"); } }, 150);
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

