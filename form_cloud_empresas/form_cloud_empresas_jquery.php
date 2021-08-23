
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
      case 'id_empresa':
      case 'ccnit':
      case 'nombre_razonsocial':
      case 'serial':
      case 'activo':
      case 'nit':
      case 'razon_social':
      case 'celular':
      case 'correo':
      case 'codsucursal':
      case 'direccion':
      case 'ciudad':
      case 'pagina_web':
      case 'actividad_principal':
      case 'regimen':
      case 'observaciones':
        sc_exib_ocult_pag('form_cloud_empresas_form0');
        break;
      case 'proveedor':
      case 'modo':
      case 'enviar_dian':
      case 'enviar_cliente':
      case 'servidor1':
      case 'servidor2':
      case 'servidor3':
      case 'tokenempresa':
      case 'tokenpassword':
      case 'servidor1_pruebas':
      case 'servidor2_pruebas':
      case 'servidor3_pruebas':
      case 'token_pruebas':
      case 'password_pruebas':
        sc_exib_ocult_pag('form_cloud_empresas_form1');
        break;
      case 'enviar_documento_online':
      case 'smtp_tipo':
      case 'smtp_servidor':
      case 'smtp_puerto':
      case 'smtp_usuario':
      case 'smtp_password':
      case 'contacto_nombre':
      case 'contacto_cargo':
      case 'contacto_correo':
      case 'contacto_celular':
      case 'contacto_fijo':
      case 'logo':
      case 'asunto':
      case 'mensaje':
      case 'head_note':
      case 'pie_pagina':
      case 'mensaje_nc':
      case 'pie_pagina_nc':
      case 'servidor_facturas':
      case 'servidor_nc':
      case 'correo_para_prueba':
      case 'correo_prueba':
      case 'enviar_datos_establecimiento':
        sc_exib_ocult_pag('form_cloud_empresas_form2');
        break;
      case 'nombre_pc_red':
      case 'sumarimpuestosdeldetalle':
      case 'cantidaddecimales':
      case 'valortributounidad':
      case 'conf_auto_tercero':
      case 'no_validar_mail':
      case 'email_alternativo':
      case 'desviar_correo_a':
      case 'correo_copia':
      case 'informacion_adicional':
      case 'tomar_municipio_tns':
      case 'validar_codcliente_tns':
      case 'desactivar_xml_enlista':
      case 'validar_correo_enlinea':
      case 'url_bouncer':
      case 'apikey_bouncer':
      case 'tiempo_bouncer':
      case 'url_validar_licencia':
        sc_exib_ocult_pag('form_cloud_empresas_form3');
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
  scEventControl_data["id_empresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ccnit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_razonsocial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["serial" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["razon_social" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codsucursal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciudad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pagina_web" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["actividad_principal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regimen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["proveedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["modo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enviar_dian" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enviar_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor3" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokenempresa" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tokenpassword" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor1_pruebas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor2_pruebas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor3_pruebas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["token_pruebas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["password_pruebas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enviar_documento_online" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_servidor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_puerto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_usuario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["smtp_password" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contacto_nombre" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contacto_cargo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contacto_correo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contacto_celular" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contacto_fijo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["asunto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mensaje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["head_note" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pie_pagina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mensaje_nc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pie_pagina_nc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor_facturas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servidor_nc" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo_para_prueba" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo_prueba" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["enviar_datos_establecimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_pc_red" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sumarimpuestosdeldetalle" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cantidaddecimales" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valortributounidad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["conf_auto_tercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["no_validar_mail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email_alternativo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desviar_correo_a" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo_copia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["informacion_adicional" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tomar_municipio_tns" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["validar_codcliente_tns" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["desactivar_xml_enlista" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["validar_correo_enlinea" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_bouncer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apikey_bouncer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tiempo_bouncer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url_validar_licencia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_empresa" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_empresa" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ccnit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ccnit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_razonsocial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_razonsocial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["serial" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["razon_social" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["razon_social" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codsucursal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codsucursal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pagina_web" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pagina_web" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["actividad_principal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["actividad_principal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
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
  if (scEventControl_data["servidor1_pruebas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor1_pruebas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor2_pruebas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor2_pruebas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor3_pruebas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor3_pruebas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["token_pruebas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["token_pruebas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["password_pruebas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["password_pruebas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enviar_documento_online" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enviar_documento_online" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_servidor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_servidor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_puerto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_puerto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_usuario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_usuario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["smtp_password" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["smtp_password" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contacto_nombre" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contacto_nombre" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contacto_cargo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contacto_cargo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contacto_correo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contacto_correo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contacto_celular" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contacto_celular" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contacto_fijo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contacto_fijo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["asunto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["asunto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mensaje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mensaje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["head_note" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["head_note" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pie_pagina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pie_pagina" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mensaje_nc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mensaje_nc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pie_pagina_nc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pie_pagina_nc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor_facturas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor_facturas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servidor_nc" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servidor_nc" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo_para_prueba" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo_para_prueba" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo_prueba" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo_prueba" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["enviar_datos_establecimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["enviar_datos_establecimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc_red" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_pc_red" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sumarimpuestosdeldetalle" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sumarimpuestosdeldetalle" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cantidaddecimales" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cantidaddecimales" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valortributounidad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valortributounidad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["conf_auto_tercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["conf_auto_tercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["no_validar_mail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["no_validar_mail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email_alternativo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email_alternativo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desviar_correo_a" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desviar_correo_a" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo_copia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo_copia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["informacion_adicional" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["informacion_adicional" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tomar_municipio_tns" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tomar_municipio_tns" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["validar_codcliente_tns" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["validar_codcliente_tns" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["desactivar_xml_enlista" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["desactivar_xml_enlista" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["validar_correo_enlinea" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["validar_correo_enlinea" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_bouncer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_bouncer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apikey_bouncer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apikey_bouncer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tiempo_bouncer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tiempo_bouncer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url_validar_licencia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url_validar_licencia" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("activo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("regimen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("proveedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("modo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("enviar_dian" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("enviar_cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("smtp_tipo" + iSeq == fieldName) {
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
  $('#id_sc_field_id_empresa' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_id_empresa_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cloud_empresas_id_empresa_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_empresas_id_empresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_ccnit' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_ccnit_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_cloud_empresas_ccnit_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_cloud_empresas_ccnit_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_razonsocial' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_nombre_razonsocial_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_cloud_empresas_nombre_razonsocial_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_cloud_empresas_nombre_razonsocial_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_celular_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cloud_empresas_celular_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cloud_empresas_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_correo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cloud_empresas_correo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cloud_empresas_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_activo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cloud_empresas_activo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cloud_empresas_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_creado' + iSeqRow).bind('change', function() { sc_form_cloud_empresas_creado_onchange(this, iSeqRow) });
  $('#id_sc_field_creado_hora' + iSeqRow).bind('change', function() { sc_form_cloud_empresas_creado_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_editado' + iSeqRow).bind('change', function() { sc_form_cloud_empresas_editado_onchange(this, iSeqRow) });
  $('#id_sc_field_editado_hora' + iSeqRow).bind('change', function() { sc_form_cloud_empresas_editado_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_codsucursal' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_codsucursal_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cloud_empresas_codsucursal_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cloud_empresas_codsucursal_onfocus(this, iSeqRow) });
  $('#id_sc_field_cantidaddecimales' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_cantidaddecimales_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_cloud_empresas_cantidaddecimales_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_cloud_empresas_cantidaddecimales_onfocus(this, iSeqRow) });
  $('#id_sc_field_valortributounidad' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_valortributounidad_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_cloud_empresas_valortributounidad_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_cloud_empresas_valortributounidad_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_observaciones_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_observaciones_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_conf_auto_tercero' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_conf_auto_tercero_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_cloud_empresas_conf_auto_tercero_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_cloud_empresas_conf_auto_tercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_no_validar_mail' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_no_validar_mail_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_cloud_empresas_no_validar_mail_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_cloud_empresas_no_validar_mail_onfocus(this, iSeqRow) });
  $('#id_sc_field_email_alternativo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_email_alternativo_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_cloud_empresas_email_alternativo_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_cloud_empresas_email_alternativo_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor1' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor1_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_empresas_servidor1_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_empresas_servidor1_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor2' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor2_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_empresas_servidor2_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_empresas_servidor2_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor3' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor3_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_empresas_servidor3_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_empresas_servidor3_onfocus(this, iSeqRow) });
  $('#id_sc_field_tokenempresa' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_tokenempresa_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cloud_empresas_tokenempresa_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cloud_empresas_tokenempresa_onfocus(this, iSeqRow) });
  $('#id_sc_field_tokenpassword' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_tokenpassword_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_tokenpassword_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_tokenpassword_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor1_pruebas' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor1_pruebas_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_cloud_empresas_servidor1_pruebas_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_cloud_empresas_servidor1_pruebas_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor2_pruebas' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor2_pruebas_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_cloud_empresas_servidor2_pruebas_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_cloud_empresas_servidor2_pruebas_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor3_pruebas' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor3_pruebas_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_cloud_empresas_servidor3_pruebas_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_cloud_empresas_servidor3_pruebas_onfocus(this, iSeqRow) });
  $('#id_sc_field_token_pruebas' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_token_pruebas_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_token_pruebas_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_token_pruebas_onfocus(this, iSeqRow) });
  $('#id_sc_field_password_pruebas' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_password_pruebas_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_cloud_empresas_password_pruebas_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_cloud_empresas_password_pruebas_onfocus(this, iSeqRow) });
  $('#id_sc_field_modo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_modo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cloud_empresas_modo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cloud_empresas_modo_onfocus(this, iSeqRow) });
  $('#id_sc_field_smtp_servidor' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_smtp_servidor_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_smtp_servidor_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_smtp_servidor_onfocus(this, iSeqRow) });
  $('#id_sc_field_smtp_usuario' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_smtp_usuario_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cloud_empresas_smtp_usuario_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cloud_empresas_smtp_usuario_onfocus(this, iSeqRow) });
  $('#id_sc_field_smtp_password' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_smtp_password_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_smtp_password_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_smtp_password_onfocus(this, iSeqRow) });
  $('#id_sc_field_smtp_puerto' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_smtp_puerto_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cloud_empresas_smtp_puerto_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cloud_empresas_smtp_puerto_onfocus(this, iSeqRow) });
  $('#id_sc_field_smtp_tipo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_smtp_tipo_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_empresas_smtp_tipo_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_empresas_smtp_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_asunto' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_asunto_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cloud_empresas_asunto_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cloud_empresas_asunto_onfocus(this, iSeqRow) });
  $('#id_sc_field_mensaje' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_mensaje_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cloud_empresas_mensaje_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cloud_empresas_mensaje_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo_para_prueba' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_correo_para_prueba_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_form_cloud_empresas_correo_para_prueba_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_form_cloud_empresas_correo_para_prueba_onfocus(this, iSeqRow) });
  $('#id_sc_field_logo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_logo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_cloud_empresas_logo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_cloud_empresas_logo_onfocus(this, iSeqRow) });
  $('#id_sc_field_enviar_documento_online' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_enviar_documento_online_onblur(this, iSeqRow) })
                                                     .bind('change', function() { sc_form_cloud_empresas_enviar_documento_online_onchange(this, iSeqRow) })
                                                     .bind('focus', function() { sc_form_cloud_empresas_enviar_documento_online_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto_nombre' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_contacto_nombre_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_cloud_empresas_contacto_nombre_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_cloud_empresas_contacto_nombre_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto_cargo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_contacto_cargo_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cloud_empresas_contacto_cargo_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cloud_empresas_contacto_cargo_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto_correo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_contacto_correo_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_form_cloud_empresas_contacto_correo_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_cloud_empresas_contacto_correo_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto_celular' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_contacto_celular_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_cloud_empresas_contacto_celular_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_cloud_empresas_contacto_celular_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto_fijo' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_contacto_fijo_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_contacto_fijo_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_contacto_fijo_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor_facturas' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor_facturas_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_cloud_empresas_servidor_facturas_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_cloud_empresas_servidor_facturas_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo_copia' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_correo_copia_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cloud_empresas_correo_copia_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cloud_empresas_correo_copia_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_direccion_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_empresas_direccion_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_empresas_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciudad' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_ciudad_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cloud_empresas_ciudad_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cloud_empresas_ciudad_onfocus(this, iSeqRow) });
  $('#id_sc_field_pagina_web' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_pagina_web_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cloud_empresas_pagina_web_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_empresas_pagina_web_onfocus(this, iSeqRow) });
  $('#id_sc_field_actividad_principal' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_actividad_principal_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_cloud_empresas_actividad_principal_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_cloud_empresas_actividad_principal_onfocus(this, iSeqRow) });
  $('#id_sc_field_regimen' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_regimen_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_cloud_empresas_regimen_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_cloud_empresas_regimen_onfocus(this, iSeqRow) });
  $('#id_sc_field_desviar_correo_a' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_desviar_correo_a_onblur(this, iSeqRow) })
                                              .bind('change', function() { sc_form_cloud_empresas_desviar_correo_a_onchange(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_cloud_empresas_desviar_correo_a_onfocus(this, iSeqRow) });
  $('#id_sc_field_pie_pagina' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_pie_pagina_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cloud_empresas_pie_pagina_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_empresas_pie_pagina_onfocus(this, iSeqRow) });
  $('#id_sc_field_mensaje_nc' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_mensaje_nc_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_cloud_empresas_mensaje_nc_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_cloud_empresas_mensaje_nc_onfocus(this, iSeqRow) });
  $('#id_sc_field_pie_pagina_nc' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_pie_pagina_nc_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_pie_pagina_nc_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_pie_pagina_nc_onfocus(this, iSeqRow) });
  $('#id_sc_field_servidor_nc' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_servidor_nc_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cloud_empresas_servidor_nc_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cloud_empresas_servidor_nc_onfocus(this, iSeqRow) });
  $('#id_sc_field_informacion_adicional' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_informacion_adicional_onblur(this, iSeqRow) })
                                                   .bind('change', function() { sc_form_cloud_empresas_informacion_adicional_onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_form_cloud_empresas_informacion_adicional_onfocus(this, iSeqRow) });
  $('#id_sc_field_sumarimpuestosdeldetalle' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_sumarimpuestosdeldetalle_onblur(this, iSeqRow) })
                                                      .bind('change', function() { sc_form_cloud_empresas_sumarimpuestosdeldetalle_onchange(this, iSeqRow) })
                                                      .bind('focus', function() { sc_form_cloud_empresas_sumarimpuestosdeldetalle_onfocus(this, iSeqRow) });
  $('#id_sc_field_serial' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_serial_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_cloud_empresas_serial_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_cloud_empresas_serial_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_pc_red' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_nombre_pc_red_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_nombre_pc_red_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_nombre_pc_red_onfocus(this, iSeqRow) });
  $('#id_sc_field_proveedor' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_proveedor_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_empresas_proveedor_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_empresas_proveedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_enviar_dian' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_enviar_dian_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cloud_empresas_enviar_dian_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cloud_empresas_enviar_dian_onfocus(this, iSeqRow) });
  $('#id_sc_field_enviar_cliente' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_enviar_cliente_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cloud_empresas_enviar_cliente_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cloud_empresas_enviar_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_nit' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_nit_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_cloud_empresas_nit_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_cloud_empresas_nit_onfocus(this, iSeqRow) });
  $('#id_sc_field_razon_social' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_razon_social_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_cloud_empresas_razon_social_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_cloud_empresas_razon_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_head_note' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_head_note_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_cloud_empresas_head_note_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_cloud_empresas_head_note_onfocus(this, iSeqRow) });
  $('#id_sc_field_tomar_municipio_tns' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_tomar_municipio_tns_onblur(this, iSeqRow) })
                                                 .bind('change', function() { sc_form_cloud_empresas_tomar_municipio_tns_onchange(this, iSeqRow) })
                                                 .bind('focus', function() { sc_form_cloud_empresas_tomar_municipio_tns_onfocus(this, iSeqRow) });
  $('#id_sc_field_validar_codcliente_tns' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_validar_codcliente_tns_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_cloud_empresas_validar_codcliente_tns_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_cloud_empresas_validar_codcliente_tns_onfocus(this, iSeqRow) });
  $('#id_sc_field_desactivar_xml_enlista' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_desactivar_xml_enlista_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_cloud_empresas_desactivar_xml_enlista_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_cloud_empresas_desactivar_xml_enlista_onfocus(this, iSeqRow) });
  $('#id_sc_field_validar_correo_enlinea' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_validar_correo_enlinea_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_form_cloud_empresas_validar_correo_enlinea_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_form_cloud_empresas_validar_correo_enlinea_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_validar_licencia' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_url_validar_licencia_onblur(this, iSeqRow) })
                                                  .bind('change', function() { sc_form_cloud_empresas_url_validar_licencia_onchange(this, iSeqRow) })
                                                  .bind('focus', function() { sc_form_cloud_empresas_url_validar_licencia_onfocus(this, iSeqRow) });
  $('#id_sc_field_url_bouncer' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_url_bouncer_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_cloud_empresas_url_bouncer_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_cloud_empresas_url_bouncer_onfocus(this, iSeqRow) });
  $('#id_sc_field_apikey_bouncer' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_apikey_bouncer_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cloud_empresas_apikey_bouncer_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cloud_empresas_apikey_bouncer_onfocus(this, iSeqRow) });
  $('#id_sc_field_tiempo_bouncer' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_tiempo_bouncer_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_cloud_empresas_tiempo_bouncer_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_cloud_empresas_tiempo_bouncer_onfocus(this, iSeqRow) });
  $('#id_sc_field_enviar_datos_establecimiento' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_enviar_datos_establecimiento_onblur(this, iSeqRow) })
                                                          .bind('change', function() { sc_form_cloud_empresas_enviar_datos_establecimiento_onchange(this, iSeqRow) })
                                                          .bind('focus', function() { sc_form_cloud_empresas_enviar_datos_establecimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo_prueba' + iSeqRow).bind('blur', function() { sc_form_cloud_empresas_correo_prueba_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_cloud_empresas_correo_prueba_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_cloud_empresas_correo_prueba_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-enviar_documento_online' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-enviar_datos_establecimiento' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-sumarimpuestosdeldetalle' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-conf_auto_tercero' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-no_validar_mail' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-tomar_municipio_tns' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-validar_codcliente_tns' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-desactivar_xml_enlista' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-validar_correo_enlinea' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_cloud_empresas_id_empresa_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_id_empresa();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_id_empresa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_id_empresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_ccnit_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_ccnit();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_ccnit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_ccnit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_nombre_razonsocial_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_nombre_razonsocial();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_nombre_razonsocial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_nombre_razonsocial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_celular();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_celular_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_celular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_correo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_correo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_activo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_activo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_activo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_creado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_creado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_editado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_editado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_codsucursal_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_codsucursal();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_codsucursal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_codsucursal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_cantidaddecimales_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_cantidaddecimales();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_cantidaddecimales_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_cantidaddecimales_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_valortributounidad_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_valortributounidad();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_valortributounidad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_valortributounidad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_observaciones();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_observaciones_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_conf_auto_tercero_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_conf_auto_tercero();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_conf_auto_tercero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_conf_auto_tercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_no_validar_mail_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_no_validar_mail();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_no_validar_mail_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_no_validar_mail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_email_alternativo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_email_alternativo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_email_alternativo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_email_alternativo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor1_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor1();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor2_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor2();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor3_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor3();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor3_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor3_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_tokenempresa_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_tokenempresa();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_tokenempresa_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_tokenempresa_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_tokenpassword_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_tokenpassword();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_tokenpassword_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_tokenpassword_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor1_pruebas_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor1_pruebas();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor1_pruebas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor1_pruebas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor2_pruebas_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor2_pruebas();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor2_pruebas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor2_pruebas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor3_pruebas_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor3_pruebas();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor3_pruebas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor3_pruebas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_token_pruebas_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_token_pruebas();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_token_pruebas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_token_pruebas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_password_pruebas_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_password_pruebas();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_password_pruebas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_password_pruebas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_modo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_modo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_modo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_modo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_smtp_servidor_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_smtp_servidor();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_smtp_servidor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_smtp_servidor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_smtp_usuario_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_smtp_usuario();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_smtp_usuario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_smtp_usuario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_smtp_password_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_smtp_password();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_smtp_password_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_smtp_password_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_smtp_puerto_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_smtp_puerto();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_smtp_puerto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_smtp_puerto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_smtp_tipo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_smtp_tipo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_smtp_tipo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_smtp_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_asunto_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_asunto();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_asunto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_asunto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_mensaje_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_mensaje();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_mensaje_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_mensaje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_correo_para_prueba_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_correo_para_prueba();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_correo_para_prueba_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_correo_para_prueba_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_logo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_logo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_logo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_enviar_documento_online_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_enviar_documento_online();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_enviar_documento_online_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_enviar_documento_online_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_contacto_nombre_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_contacto_nombre();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_contacto_nombre_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_contacto_nombre_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_contacto_cargo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_contacto_cargo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_contacto_cargo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_contacto_cargo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_contacto_correo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_contacto_correo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_contacto_correo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_contacto_correo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_contacto_celular_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_contacto_celular();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_contacto_celular_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_contacto_celular_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_contacto_fijo_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_contacto_fijo();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_contacto_fijo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_contacto_fijo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor_facturas_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor_facturas();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor_facturas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor_facturas_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_correo_copia_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_correo_copia();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_correo_copia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_correo_copia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_direccion_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_direccion();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_direccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_ciudad_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_ciudad();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_ciudad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_ciudad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_pagina_web_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_pagina_web();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_pagina_web_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_pagina_web_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_actividad_principal_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_actividad_principal();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_actividad_principal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_actividad_principal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_regimen_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_regimen();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_regimen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_regimen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_desviar_correo_a_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_desviar_correo_a();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_desviar_correo_a_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_desviar_correo_a_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_pie_pagina_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_pie_pagina();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_pie_pagina_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_pie_pagina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_mensaje_nc_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_mensaje_nc();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_mensaje_nc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_mensaje_nc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_pie_pagina_nc_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_pie_pagina_nc();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_pie_pagina_nc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_pie_pagina_nc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_servidor_nc_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_servidor_nc();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_servidor_nc_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_servidor_nc_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_informacion_adicional_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_informacion_adicional();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_informacion_adicional_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_informacion_adicional_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_sumarimpuestosdeldetalle_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_sumarimpuestosdeldetalle();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_sumarimpuestosdeldetalle_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_sumarimpuestosdeldetalle_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_serial_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_serial();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_serial_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_serial_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_nombre_pc_red_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_nombre_pc_red();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_nombre_pc_red_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_nombre_pc_red_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_proveedor_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_proveedor();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_proveedor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_proveedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_enviar_dian_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_enviar_dian();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_enviar_dian_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_enviar_dian_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_enviar_cliente_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_enviar_cliente();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_enviar_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_enviar_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_nit_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_nit();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_nit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_nit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_razon_social_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_razon_social();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_razon_social_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_razon_social_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_head_note_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_head_note();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_head_note_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_head_note_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_tomar_municipio_tns_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_tomar_municipio_tns();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_tomar_municipio_tns_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_tomar_municipio_tns_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_validar_codcliente_tns_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_validar_codcliente_tns();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_validar_codcliente_tns_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_validar_codcliente_tns_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_desactivar_xml_enlista_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_desactivar_xml_enlista();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_desactivar_xml_enlista_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_desactivar_xml_enlista_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_validar_correo_enlinea_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_validar_correo_enlinea();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_validar_correo_enlinea_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_validar_correo_enlinea_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_url_validar_licencia_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_url_validar_licencia();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_url_validar_licencia_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_url_validar_licencia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_url_bouncer_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_url_bouncer();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_url_bouncer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_url_bouncer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_apikey_bouncer_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_apikey_bouncer();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_apikey_bouncer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_apikey_bouncer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_tiempo_bouncer_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_tiempo_bouncer();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_tiempo_bouncer_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_tiempo_bouncer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_enviar_datos_establecimiento_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_enviar_datos_establecimiento();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_enviar_datos_establecimiento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_enviar_datos_establecimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_cloud_empresas_correo_prueba_onblur(oThis, iSeqRow) {
  do_ajax_form_cloud_empresas_validate_correo_prueba();
  scCssBlur(oThis);
}

function sc_form_cloud_empresas_correo_prueba_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_cloud_empresas_correo_prueba_onfocus(oThis, iSeqRow) {
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
	displayChange_block("3", status);
}

function displayChange_page_2(status) {
	displayChange_block("4", status);
	displayChange_block("5", status);
	displayChange_block("6", status);
}

function displayChange_page_3(status) {
	displayChange_block("7", status);
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
	if ("5" == block) {
		displayChange_block_5(status);
	}
	if ("6" == block) {
		displayChange_block_6(status);
	}
	if ("7" == block) {
		displayChange_block_7(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_empresa", "", status);
	displayChange_field("ccnit", "", status);
	displayChange_field("nombre_razonsocial", "", status);
	displayChange_field("serial", "", status);
	displayChange_field("activo", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("nit", "", status);
	displayChange_field("razon_social", "", status);
	displayChange_field("celular", "", status);
	displayChange_field("correo", "", status);
	displayChange_field("codsucursal", "", status);
	displayChange_field("direccion", "", status);
	displayChange_field("ciudad", "", status);
	displayChange_field("pagina_web", "", status);
	displayChange_field("actividad_principal", "", status);
	displayChange_field("regimen", "", status);
	displayChange_field("observaciones", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("proveedor", "", status);
	displayChange_field("modo", "", status);
	displayChange_field("enviar_dian", "", status);
	displayChange_field("enviar_cliente", "", status);
	displayChange_field("servidor1", "", status);
	displayChange_field("servidor2", "", status);
	displayChange_field("servidor3", "", status);
	displayChange_field("tokenempresa", "", status);
	displayChange_field("tokenpassword", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("servidor1_pruebas", "", status);
	displayChange_field("servidor2_pruebas", "", status);
	displayChange_field("servidor3_pruebas", "", status);
	displayChange_field("token_pruebas", "", status);
	displayChange_field("password_pruebas", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("enviar_documento_online", "", status);
	displayChange_field("smtp_tipo", "", status);
	displayChange_field("smtp_servidor", "", status);
	displayChange_field("smtp_puerto", "", status);
	displayChange_field("smtp_usuario", "", status);
	displayChange_field("smtp_password", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("contacto_nombre", "", status);
	displayChange_field("contacto_cargo", "", status);
	displayChange_field("contacto_correo", "", status);
	displayChange_field("contacto_celular", "", status);
	displayChange_field("contacto_fijo", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("logo", "", status);
	displayChange_field("asunto", "", status);
	displayChange_field("mensaje", "", status);
	displayChange_field("head_note", "", status);
	displayChange_field("pie_pagina", "", status);
	displayChange_field("mensaje_nc", "", status);
	displayChange_field("pie_pagina_nc", "", status);
	displayChange_field("servidor_facturas", "", status);
	displayChange_field("servidor_nc", "", status);
	displayChange_field("correo_para_prueba", "", status);
	displayChange_field("correo_prueba", "", status);
	displayChange_field("enviar_datos_establecimiento", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("nombre_pc_red", "", status);
	displayChange_field("sumarimpuestosdeldetalle", "", status);
	displayChange_field("cantidaddecimales", "", status);
	displayChange_field("valortributounidad", "", status);
	displayChange_field("conf_auto_tercero", "", status);
	displayChange_field("no_validar_mail", "", status);
	displayChange_field("email_alternativo", "", status);
	displayChange_field("desviar_correo_a", "", status);
	displayChange_field("correo_copia", "", status);
	displayChange_field("informacion_adicional", "", status);
	displayChange_field("tomar_municipio_tns", "", status);
	displayChange_field("validar_codcliente_tns", "", status);
	displayChange_field("desactivar_xml_enlista", "", status);
	displayChange_field("validar_correo_enlinea", "", status);
	displayChange_field("url_bouncer", "", status);
	displayChange_field("apikey_bouncer", "", status);
	displayChange_field("tiempo_bouncer", "", status);
	displayChange_field("url_validar_licencia", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_empresa(row, status);
	displayChange_field_ccnit(row, status);
	displayChange_field_nombre_razonsocial(row, status);
	displayChange_field_serial(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_nit(row, status);
	displayChange_field_razon_social(row, status);
	displayChange_field_celular(row, status);
	displayChange_field_correo(row, status);
	displayChange_field_codsucursal(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_ciudad(row, status);
	displayChange_field_pagina_web(row, status);
	displayChange_field_actividad_principal(row, status);
	displayChange_field_regimen(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_proveedor(row, status);
	displayChange_field_modo(row, status);
	displayChange_field_enviar_dian(row, status);
	displayChange_field_enviar_cliente(row, status);
	displayChange_field_servidor1(row, status);
	displayChange_field_servidor2(row, status);
	displayChange_field_servidor3(row, status);
	displayChange_field_tokenempresa(row, status);
	displayChange_field_tokenpassword(row, status);
	displayChange_field_servidor1_pruebas(row, status);
	displayChange_field_servidor2_pruebas(row, status);
	displayChange_field_servidor3_pruebas(row, status);
	displayChange_field_token_pruebas(row, status);
	displayChange_field_password_pruebas(row, status);
	displayChange_field_enviar_documento_online(row, status);
	displayChange_field_smtp_tipo(row, status);
	displayChange_field_smtp_servidor(row, status);
	displayChange_field_smtp_puerto(row, status);
	displayChange_field_smtp_usuario(row, status);
	displayChange_field_smtp_password(row, status);
	displayChange_field_contacto_nombre(row, status);
	displayChange_field_contacto_cargo(row, status);
	displayChange_field_contacto_correo(row, status);
	displayChange_field_contacto_celular(row, status);
	displayChange_field_contacto_fijo(row, status);
	displayChange_field_logo(row, status);
	displayChange_field_asunto(row, status);
	displayChange_field_mensaje(row, status);
	displayChange_field_head_note(row, status);
	displayChange_field_pie_pagina(row, status);
	displayChange_field_mensaje_nc(row, status);
	displayChange_field_pie_pagina_nc(row, status);
	displayChange_field_servidor_facturas(row, status);
	displayChange_field_servidor_nc(row, status);
	displayChange_field_correo_para_prueba(row, status);
	displayChange_field_correo_prueba(row, status);
	displayChange_field_enviar_datos_establecimiento(row, status);
	displayChange_field_nombre_pc_red(row, status);
	displayChange_field_sumarimpuestosdeldetalle(row, status);
	displayChange_field_cantidaddecimales(row, status);
	displayChange_field_valortributounidad(row, status);
	displayChange_field_conf_auto_tercero(row, status);
	displayChange_field_no_validar_mail(row, status);
	displayChange_field_email_alternativo(row, status);
	displayChange_field_desviar_correo_a(row, status);
	displayChange_field_correo_copia(row, status);
	displayChange_field_informacion_adicional(row, status);
	displayChange_field_tomar_municipio_tns(row, status);
	displayChange_field_validar_codcliente_tns(row, status);
	displayChange_field_desactivar_xml_enlista(row, status);
	displayChange_field_validar_correo_enlinea(row, status);
	displayChange_field_url_bouncer(row, status);
	displayChange_field_apikey_bouncer(row, status);
	displayChange_field_tiempo_bouncer(row, status);
	displayChange_field_url_validar_licencia(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_empresa" == field) {
		displayChange_field_id_empresa(row, status);
	}
	if ("ccnit" == field) {
		displayChange_field_ccnit(row, status);
	}
	if ("nombre_razonsocial" == field) {
		displayChange_field_nombre_razonsocial(row, status);
	}
	if ("serial" == field) {
		displayChange_field_serial(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("nit" == field) {
		displayChange_field_nit(row, status);
	}
	if ("razon_social" == field) {
		displayChange_field_razon_social(row, status);
	}
	if ("celular" == field) {
		displayChange_field_celular(row, status);
	}
	if ("correo" == field) {
		displayChange_field_correo(row, status);
	}
	if ("codsucursal" == field) {
		displayChange_field_codsucursal(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("ciudad" == field) {
		displayChange_field_ciudad(row, status);
	}
	if ("pagina_web" == field) {
		displayChange_field_pagina_web(row, status);
	}
	if ("actividad_principal" == field) {
		displayChange_field_actividad_principal(row, status);
	}
	if ("regimen" == field) {
		displayChange_field_regimen(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("proveedor" == field) {
		displayChange_field_proveedor(row, status);
	}
	if ("modo" == field) {
		displayChange_field_modo(row, status);
	}
	if ("enviar_dian" == field) {
		displayChange_field_enviar_dian(row, status);
	}
	if ("enviar_cliente" == field) {
		displayChange_field_enviar_cliente(row, status);
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
	if ("servidor1_pruebas" == field) {
		displayChange_field_servidor1_pruebas(row, status);
	}
	if ("servidor2_pruebas" == field) {
		displayChange_field_servidor2_pruebas(row, status);
	}
	if ("servidor3_pruebas" == field) {
		displayChange_field_servidor3_pruebas(row, status);
	}
	if ("token_pruebas" == field) {
		displayChange_field_token_pruebas(row, status);
	}
	if ("password_pruebas" == field) {
		displayChange_field_password_pruebas(row, status);
	}
	if ("enviar_documento_online" == field) {
		displayChange_field_enviar_documento_online(row, status);
	}
	if ("smtp_tipo" == field) {
		displayChange_field_smtp_tipo(row, status);
	}
	if ("smtp_servidor" == field) {
		displayChange_field_smtp_servidor(row, status);
	}
	if ("smtp_puerto" == field) {
		displayChange_field_smtp_puerto(row, status);
	}
	if ("smtp_usuario" == field) {
		displayChange_field_smtp_usuario(row, status);
	}
	if ("smtp_password" == field) {
		displayChange_field_smtp_password(row, status);
	}
	if ("contacto_nombre" == field) {
		displayChange_field_contacto_nombre(row, status);
	}
	if ("contacto_cargo" == field) {
		displayChange_field_contacto_cargo(row, status);
	}
	if ("contacto_correo" == field) {
		displayChange_field_contacto_correo(row, status);
	}
	if ("contacto_celular" == field) {
		displayChange_field_contacto_celular(row, status);
	}
	if ("contacto_fijo" == field) {
		displayChange_field_contacto_fijo(row, status);
	}
	if ("logo" == field) {
		displayChange_field_logo(row, status);
	}
	if ("asunto" == field) {
		displayChange_field_asunto(row, status);
	}
	if ("mensaje" == field) {
		displayChange_field_mensaje(row, status);
	}
	if ("head_note" == field) {
		displayChange_field_head_note(row, status);
	}
	if ("pie_pagina" == field) {
		displayChange_field_pie_pagina(row, status);
	}
	if ("mensaje_nc" == field) {
		displayChange_field_mensaje_nc(row, status);
	}
	if ("pie_pagina_nc" == field) {
		displayChange_field_pie_pagina_nc(row, status);
	}
	if ("servidor_facturas" == field) {
		displayChange_field_servidor_facturas(row, status);
	}
	if ("servidor_nc" == field) {
		displayChange_field_servidor_nc(row, status);
	}
	if ("correo_para_prueba" == field) {
		displayChange_field_correo_para_prueba(row, status);
	}
	if ("correo_prueba" == field) {
		displayChange_field_correo_prueba(row, status);
	}
	if ("enviar_datos_establecimiento" == field) {
		displayChange_field_enviar_datos_establecimiento(row, status);
	}
	if ("nombre_pc_red" == field) {
		displayChange_field_nombre_pc_red(row, status);
	}
	if ("sumarimpuestosdeldetalle" == field) {
		displayChange_field_sumarimpuestosdeldetalle(row, status);
	}
	if ("cantidaddecimales" == field) {
		displayChange_field_cantidaddecimales(row, status);
	}
	if ("valortributounidad" == field) {
		displayChange_field_valortributounidad(row, status);
	}
	if ("conf_auto_tercero" == field) {
		displayChange_field_conf_auto_tercero(row, status);
	}
	if ("no_validar_mail" == field) {
		displayChange_field_no_validar_mail(row, status);
	}
	if ("email_alternativo" == field) {
		displayChange_field_email_alternativo(row, status);
	}
	if ("desviar_correo_a" == field) {
		displayChange_field_desviar_correo_a(row, status);
	}
	if ("correo_copia" == field) {
		displayChange_field_correo_copia(row, status);
	}
	if ("informacion_adicional" == field) {
		displayChange_field_informacion_adicional(row, status);
	}
	if ("tomar_municipio_tns" == field) {
		displayChange_field_tomar_municipio_tns(row, status);
	}
	if ("validar_codcliente_tns" == field) {
		displayChange_field_validar_codcliente_tns(row, status);
	}
	if ("desactivar_xml_enlista" == field) {
		displayChange_field_desactivar_xml_enlista(row, status);
	}
	if ("validar_correo_enlinea" == field) {
		displayChange_field_validar_correo_enlinea(row, status);
	}
	if ("url_bouncer" == field) {
		displayChange_field_url_bouncer(row, status);
	}
	if ("apikey_bouncer" == field) {
		displayChange_field_apikey_bouncer(row, status);
	}
	if ("tiempo_bouncer" == field) {
		displayChange_field_tiempo_bouncer(row, status);
	}
	if ("url_validar_licencia" == field) {
		displayChange_field_url_validar_licencia(row, status);
	}
}

function displayChange_field_id_empresa(row, status) {
}

function displayChange_field_ccnit(row, status) {
}

function displayChange_field_nombre_razonsocial(row, status) {
}

function displayChange_field_serial(row, status) {
}

function displayChange_field_activo(row, status) {
}

function displayChange_field_nit(row, status) {
}

function displayChange_field_razon_social(row, status) {
}

function displayChange_field_celular(row, status) {
}

function displayChange_field_correo(row, status) {
}

function displayChange_field_codsucursal(row, status) {
}

function displayChange_field_direccion(row, status) {
}

function displayChange_field_ciudad(row, status) {
}

function displayChange_field_pagina_web(row, status) {
}

function displayChange_field_actividad_principal(row, status) {
}

function displayChange_field_regimen(row, status) {
}

function displayChange_field_observaciones(row, status) {
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
}

function displayChange_field_enviar_dian(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_enviar_dian__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_enviar_dian" + row).select2("destroy");
		}
		scJQSelect2Add(row, "enviar_dian");
	}
}

function displayChange_field_enviar_cliente(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_enviar_cliente__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_enviar_cliente" + row).select2("destroy");
		}
		scJQSelect2Add(row, "enviar_cliente");
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

function displayChange_field_servidor1_pruebas(row, status) {
}

function displayChange_field_servidor2_pruebas(row, status) {
}

function displayChange_field_servidor3_pruebas(row, status) {
}

function displayChange_field_token_pruebas(row, status) {
}

function displayChange_field_password_pruebas(row, status) {
}

function displayChange_field_enviar_documento_online(row, status) {
}

function displayChange_field_smtp_tipo(row, status) {
}

function displayChange_field_smtp_servidor(row, status) {
}

function displayChange_field_smtp_puerto(row, status) {
}

function displayChange_field_smtp_usuario(row, status) {
}

function displayChange_field_smtp_password(row, status) {
}

function displayChange_field_contacto_nombre(row, status) {
}

function displayChange_field_contacto_cargo(row, status) {
}

function displayChange_field_contacto_correo(row, status) {
}

function displayChange_field_contacto_celular(row, status) {
}

function displayChange_field_contacto_fijo(row, status) {
}

function displayChange_field_logo(row, status) {
}

function displayChange_field_asunto(row, status) {
}

function displayChange_field_mensaje(row, status) {
}

function displayChange_field_head_note(row, status) {
}

function displayChange_field_pie_pagina(row, status) {
}

function displayChange_field_mensaje_nc(row, status) {
}

function displayChange_field_pie_pagina_nc(row, status) {
}

function displayChange_field_servidor_facturas(row, status) {
}

function displayChange_field_servidor_nc(row, status) {
}

function displayChange_field_correo_para_prueba(row, status) {
}

function displayChange_field_correo_prueba(row, status) {
}

function displayChange_field_enviar_datos_establecimiento(row, status) {
}

function displayChange_field_nombre_pc_red(row, status) {
}

function displayChange_field_sumarimpuestosdeldetalle(row, status) {
}

function displayChange_field_cantidaddecimales(row, status) {
}

function displayChange_field_valortributounidad(row, status) {
}

function displayChange_field_conf_auto_tercero(row, status) {
}

function displayChange_field_no_validar_mail(row, status) {
}

function displayChange_field_email_alternativo(row, status) {
}

function displayChange_field_desviar_correo_a(row, status) {
}

function displayChange_field_correo_copia(row, status) {
}

function displayChange_field_informacion_adicional(row, status) {
}

function displayChange_field_tomar_municipio_tns(row, status) {
}

function displayChange_field_validar_codcliente_tns(row, status) {
}

function displayChange_field_desactivar_xml_enlista(row, status) {
}

function displayChange_field_validar_correo_enlinea(row, status) {
}

function displayChange_field_url_bouncer(row, status) {
}

function displayChange_field_apikey_bouncer(row, status) {
}

function displayChange_field_tiempo_bouncer(row, status) {
}

function displayChange_field_url_validar_licencia(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_proveedor("all", "on");
	displayChange_field_enviar_dian("all", "on");
	displayChange_field_enviar_cliente("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_cloud_empresas_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(27);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_creado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_creado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['creado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_cloud_empresas_validate_creado(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['creado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_editado" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_editado" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['editado']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['editado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_cloud_empresas_validate_editado(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['editado']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['observaciones']) && $this->nmgp_cmp_readonly['observaciones'] == 'on')
{
    unset($this->nmgp_cmp_readonly['observaciones']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "newdocument,fullpage,separator,bold,italic,underline,strikethrough,separator,alignleft,aligncenter,alignright,alignjustify,separator,styleselect,formatselect,fontselect,fontsizeselect",
  toolbar2: "cut,copy,paste,separator,searchreplace,separator,bullist,numlist,separator,outdent,indent,blockquote,separator,undo,redo,separator,link,unlink,anchor,image,media,code,separator,insertdatetime,preview,separator,forecolor,backcolor",
  toolbar3: "table,separator,hr,removeformat,separator,subscript,superscript,separator,charmap,emoticons,separator,print,fullscreen,separator,ltr,rtl,separator,separator,visualchars,visualblocks,nonbreaking,template,pagebreak,restoredraft",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_observaciones" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="observaciones' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['mensaje']) && $this->nmgp_cmp_readonly['mensaje'] == 'on')
{
    unset($this->nmgp_cmp_readonly['mensaje']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "newdocument,fullpage,separator,bold,italic,underline,strikethrough,separator,alignleft,aligncenter,alignright,alignjustify,separator,styleselect,formatselect,fontselect,fontsizeselect",
  toolbar2: "cut,copy,paste,separator,searchreplace,separator,bullist,numlist,separator,outdent,indent,blockquote,separator,undo,redo,separator,link,unlink,anchor,image,media,code,separator,insertdatetime,preview,separator,forecolor,backcolor",
  toolbar3: "table,separator,hr,removeformat,separator,subscript,superscript,separator,charmap,emoticons,separator,print,fullscreen,separator,ltr,rtl,separator,separator,visualchars,visualblocks,nonbreaking,template,pagebreak,restoredraft",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_mensaje" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="mensaje' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['mensaje_nc']) && $this->nmgp_cmp_readonly['mensaje_nc'] == 'on')
{
    unset($this->nmgp_cmp_readonly['mensaje_nc']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "newdocument,fullpage,separator,bold,italic,underline,strikethrough,separator,alignleft,aligncenter,alignright,alignjustify,separator,styleselect,formatselect,fontselect,fontsizeselect",
  toolbar2: "cut,copy,paste,separator,searchreplace,separator,bullist,numlist,separator,outdent,indent,blockquote,separator,undo,redo,separator,link,unlink,anchor,image,media,code,separator,insertdatetime,preview,separator,forecolor,backcolor",
  toolbar3: "table,separator,hr,removeformat,separator,subscript,superscript,separator,charmap,emoticons,separator,print,fullscreen,separator,ltr,rtl,separator,separator,visualchars,visualblocks,nonbreaking,template,pagebreak,restoredraft",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_mensaje_nc" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="mensaje_nc' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['pie_pagina_nc']) && $this->nmgp_cmp_readonly['pie_pagina_nc'] == 'on')
{
    unset($this->nmgp_cmp_readonly['pie_pagina_nc']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "newdocument,fullpage,separator,bold,italic,underline,strikethrough,separator,alignleft,aligncenter,alignright,alignjustify,separator,styleselect,formatselect,fontselect,fontsizeselect",
  toolbar2: "cut,copy,paste,separator,searchreplace,separator,bullist,numlist,separator,outdent,indent,blockquote,separator,undo,redo,separator,link,unlink,anchor,image,media,code,separator,insertdatetime,preview,separator,forecolor,backcolor",
  toolbar3: "table,separator,hr,removeformat,separator,subscript,superscript,separator,charmap,emoticons,separator,print,fullscreen,separator,ltr,rtl,separator,separator,visualchars,visualblocks,nonbreaking,template,pagebreak,restoredraft",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_pie_pagina_nc" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="pie_pagina_nc' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_logo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_cloud_empresas_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'logo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_logo" + iSeqRow);
        loaderContent = $("#id_img_loader_logo" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_logo" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_logo(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_logo(data);
      if ('ok' != checkUploadSize) {
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_logo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_logo" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_logo" + iSeqRow).val("");
      $("#id_sc_field_logo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_logo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_logo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_logo) ? "none" : "";
      $("#id_ajax_img_logo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_logo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_thumb;
        document.F1.temp_out1_logo.value = var_ajax_img_logo;
      }
      else if (document.F1.temp_out_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_logo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_logo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_logo" + iSeqRow).css("display", "none");
      $("#id_ajax_link_logo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_cloud_empresas')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "enviar_dian" == specificField) {
    scJQSelect2Add_enviar_dian(seqRow);
  }
  if (null == specificField || "enviar_cliente" == specificField) {
    scJQSelect2Add_enviar_cliente(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_proveedor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_proveedor_obj" : "#id_sc_field_proveedor" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
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

function scJQSelect2Add_enviar_dian(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_enviar_dian_obj" : "#id_sc_field_enviar_dian" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_enviar_dian_obj',
      dropdownCssClass: 'css_enviar_dian_obj',
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

function scJQSelect2Add_enviar_cliente(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_enviar_cliente_obj" : "#id_sc_field_enviar_cliente" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_enviar_cliente_obj',
      dropdownCssClass: 'css_enviar_cliente_obj',
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
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_proveedor) { displayChange_field_proveedor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_enviar_dian) { displayChange_field_enviar_dian(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_enviar_cliente) { displayChange_field_enviar_cliente(iLine, "on"); } }, 150);
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

function scCheckUploadExtensionSize_logo(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (!["jpeg", "jpg"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

