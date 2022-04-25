
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
      case 'tipo':
      case 'regimen':
      case 'tipo_documento':
      case 'documento':
      case 'dv':
      case 'codigo_tercero':
      case 'sexo':
      case 'notificar':
      case 'nombre1':
      case 'nombre2':
      case 'apellido1':
      case 'apellido2':
      case 'tel_cel':
      case 'urlmail':
      case 'idtercero':
      case 'r_social':
      case 'nombres':
      case 'nombre_comercil':
      case 'representante':
      case 'direccion':
      case 'departamento':
      case 'idmuni':
      case 'ciudad':
      case 'codigo_postal':
      case 'observaciones':
      case 'lenguaje':
      case 'c_postal':
      case 'correo_notificafe':
      case 'celular_notificafe':
      case 'cliente':
      case 'proveedor':
      case 'empleado':
      case 'es_tecnico':
      case 'activo':
        sc_exib_ocult_pag('terceros_form0');
        break;
      case 'credito':
      case 'cupo':
      case 'cupodis':
      case 'dias_credito':
      case 'dias_mora':
      case 'efec_retencion':
      case 'listaprecios':
      case 'loatiende':
      case 'autorizado':
      case 'relleno2':
      case 'direcciones':
      case 'sucur_cliente':
      case 'detalle_tributario':
      case 'responsabilidad_fiscal':
      case 'ciiu':
      case 'nacimiento':
      case 'fechault':
      case 'saldo':
      case 'afiliacion':
        sc_exib_ocult_pag('terceros_form1');
        break;
      case 'es_cajero':
      case 'cupo_vendedor':
        sc_exib_ocult_pag('terceros_form2');
        break;
      case 'autoretenedor':
      case 'creditoprov':
      case 'dias':
      case 'url':
      case 'contacto':
      case 'telefonos_prov':
      case 'email':
      case 'fechultcomp':
      case 'saldoapagar':
        sc_exib_ocult_pag('terceros_form3');
        break;
      case 'codigo_ter':
      case 'zona_clientes':
      case 'clasificacion_clientes':
      case 'puc_auxiliar_deudores':
      case 'puc_retefuente_ventas':
      case 'puc_retefuente_servicios_clie':
      case 'puc_auxiliar_proveedores':
      case 'puc_retefuente_compras':
      case 'puc_retefuente_servicios_prov':
      case 'archivo_cedula':
      case 'archivo_rut':
      case 'archivo_nit':
      case 'archivo_pago':
      case 'id_plan':
      case 'valor_plan':
      case 'fecha_registro_fe':
      case 'nombre_contador':
      case 'estado':
      case 'si_nomina':
      case 'n_trabajadores':
      case 'si_factura_electronica':
      case 'nombre_empresa_bd':
        sc_exib_ocult_pag('terceros_form4');
        break;
      case 'archivos':
        sc_exib_ocult_pag('terceros_form5');
        break;
      case 'es_restaurante':
      case 'porcentaje_propina_sugerida':
        sc_exib_ocult_pag('terceros_form6');
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
  scEventControl_data["tipo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regimen" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tipo_documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["documento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dv" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_tercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sexo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["notificar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["apellido2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tel_cel" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["urlmail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idtercero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["r_social" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_comercil" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["representante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direccion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["departamento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["idmuni" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciudad" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_postal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["observaciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lenguaje" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["c_postal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["correo_notificafe" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["celular_notificafe" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["proveedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["empleado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_tecnico" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["activo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["credito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupodis" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dias_credito" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dias_mora" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["efec_retencion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["listaprecios" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["loatiende" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["autorizado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["relleno2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["direcciones" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sucur_cliente" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detalle_tributario" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["responsabilidad_fiscal" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["ciiu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nacimiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechault" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["afiliacion" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_cajero" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cupo_vendedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["autoretenedor" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["creditoprov" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dias" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["url" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["contacto" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["telefonos_prov" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fechultcomp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saldoapagar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["codigo_ter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["zona_clientes" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["clasificacion_clientes" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_auxiliar_deudores" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_retefuente_ventas" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_retefuente_servicios_clie" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_auxiliar_proveedores" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_retefuente_compras" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["puc_retefuente_servicios_prov" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archivo_cedula" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archivo_rut" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archivo_nit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archivo_pago" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_plan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["valor_plan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["fecha_registro_fe" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_contador" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["estado" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["si_nomina" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["n_trabajadores" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["si_factura_electronica" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nombre_empresa_bd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["archivos" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["es_restaurante" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["porcentaje_propina_sugerida" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tipo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regimen" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tipo_documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["documento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dv" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dv" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_tercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_tercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sexo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sexo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["notificar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["notificar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["apellido2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["apellido2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tel_cel" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tel_cel" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["urlmail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["urlmail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idtercero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idtercero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["r_social" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["r_social" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombres" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_comercil" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_comercil" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["representante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["representante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direccion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["departamento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["departamento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["idmuni" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["idmuni" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciudad" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_postal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_postal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["observaciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lenguaje" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lenguaje" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["c_postal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["c_postal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["correo_notificafe" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["correo_notificafe" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["celular_notificafe" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["celular_notificafe" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["proveedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["proveedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["empleado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["empleado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_tecnico" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_tecnico" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["activo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["credito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cupo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cupo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cupodis" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cupodis" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dias_credito" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dias_credito" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dias_mora" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dias_mora" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["efec_retencion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["efec_retencion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["listaprecios" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["listaprecios" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["loatiende" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["loatiende" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["autorizado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["autorizado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["relleno2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["relleno2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["direcciones" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["direcciones" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sucur_cliente" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sucur_cliente" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detalle_tributario" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detalle_tributario" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["responsabilidad_fiscal" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["responsabilidad_fiscal" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["ciiu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["ciiu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nacimiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nacimiento" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechault" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechault" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldo" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldo" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["afiliacion" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["afiliacion" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_cajero" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_cajero" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cupo_vendedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cupo_vendedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["autoretenedor" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["autoretenedor" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["creditoprov" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["creditoprov" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dias" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dias" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["url" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["url" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["contacto" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["contacto" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["telefonos_prov" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["telefonos_prov" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fechultcomp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fechultcomp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saldoapagar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saldoapagar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["codigo_ter" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["codigo_ter" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["zona_clientes" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["zona_clientes" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["clasificacion_clientes" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["clasificacion_clientes" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_auxiliar_deudores" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_auxiliar_deudores" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_ventas" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_ventas" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_servicios_clie" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_servicios_clie" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_auxiliar_proveedores" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_auxiliar_proveedores" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_compras" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_compras" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_servicios_prov" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_servicios_prov" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_plan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_plan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["valor_plan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["valor_plan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["fecha_registro_fe" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["fecha_registro_fe" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_contador" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_contador" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["estado" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["si_nomina" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["si_nomina" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["n_trabajadores" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["n_trabajadores" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["si_factura_electronica" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["si_factura_electronica" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_bd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nombre_empresa_bd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["archivos" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["archivos" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["es_restaurante" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["es_restaurante" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_propina_sugerida" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["porcentaje_propina_sugerida" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["puc_auxiliar_deudores" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_ventas" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_servicios_clie" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["puc_auxiliar_proveedores" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_compras" + iSeqRow]["autocomp"]) {
    return true;
  }
  if (scEventControl_data["puc_retefuente_servicios_prov" + iSeqRow]["autocomp"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("tipo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("regimen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tipo_documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sexo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("departamento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("idmuni" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("ciudad" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("codigo_postal" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("lenguaje" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("credito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("efec_retencion" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("listaprecios" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("loatiende" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("autoretenedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("creditoprov" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("zona_clientes" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("clasificacion_clientes" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("id_plan" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("estado" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("apellido1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("apellido2" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("credito" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("creditoprov" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("cupo" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nombre1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nombre2" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("nombre_comercil" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("proveedor" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("r_social" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("regimen" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("sucur_cliente" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tipo_documento" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("tipo" + iSeq == fieldName) {
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
  $('#id_sc_field_idtercero' + iSeqRow).bind('blur', function() { sc_terceros_idtercero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_idtercero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_idtercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_documento' + iSeqRow).bind('blur', function() { sc_terceros_documento_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_documento_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombres' + iSeqRow).bind('blur', function() { sc_terceros_nombres_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_nombres_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_nombres_onfocus(this, iSeqRow) });
  $('#id_sc_field_direccion' + iSeqRow).bind('blur', function() { sc_terceros_direccion_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_direccion_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_direccion_onfocus(this, iSeqRow) });
  $('#id_sc_field_tel_cel' + iSeqRow).bind('blur', function() { sc_terceros_tel_cel_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_tel_cel_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_tel_cel_onfocus(this, iSeqRow) });
  $('#id_sc_field_nacimiento' + iSeqRow).bind('blur', function() { sc_terceros_nacimiento_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_nacimiento_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_nacimiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_sexo' + iSeqRow).bind('blur', function() { sc_terceros_sexo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_terceros_sexo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_sexo_onfocus(this, iSeqRow) });
  $('#id_sc_field_urlmail' + iSeqRow).bind('blur', function() { sc_terceros_urlmail_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_urlmail_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_urlmail_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechault' + iSeqRow).bind('blur', function() { sc_terceros_fechault_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_fechault_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_fechault_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldo' + iSeqRow).bind('blur', function() { sc_terceros_saldo_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_terceros_saldo_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_terceros_saldo_onfocus(this, iSeqRow) });
  $('#id_sc_field_afiliacion' + iSeqRow).bind('blur', function() { sc_terceros_afiliacion_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_afiliacion_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_afiliacion_onfocus(this, iSeqRow) });
  $('#id_sc_field_idmuni' + iSeqRow).bind('blur', function() { sc_terceros_idmuni_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_terceros_idmuni_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_terceros_idmuni_onfocus(this, iSeqRow) });
  $('#id_sc_field_observaciones' + iSeqRow).bind('blur', function() { sc_terceros_observaciones_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_observaciones_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_observaciones_onfocus(this, iSeqRow) });
  $('#id_sc_field_credito' + iSeqRow).bind('blur', function() { sc_terceros_credito_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_credito_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_credito_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupo' + iSeqRow).bind('blur', function() { sc_terceros_cupo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_terceros_cupo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_cupo_onfocus(this, iSeqRow) });
  $('#id_sc_field_listaprecios' + iSeqRow).bind('blur', function() { sc_terceros_listaprecios_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_terceros_listaprecios_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_terceros_listaprecios_onfocus(this, iSeqRow) });
  $('#id_sc_field_loatiende' + iSeqRow).bind('blur', function() { sc_terceros_loatiende_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_loatiende_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_loatiende_onfocus(this, iSeqRow) });
  $('#id_sc_field_con_actual' + iSeqRow).bind('change', function() { sc_terceros_con_actual_onchange(this, iSeqRow) });
  $('#id_sc_field_con_actual_hora' + iSeqRow).bind('change', function() { sc_terceros_con_actual_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_efec_retencion' + iSeqRow).bind('blur', function() { sc_terceros_efec_retencion_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_efec_retencion_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_efec_retencion_onfocus(this, iSeqRow) });
  $('#id_sc_field_regimen' + iSeqRow).bind('blur', function() { sc_terceros_regimen_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_regimen_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_regimen_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo' + iSeqRow).bind('blur', function() { sc_terceros_tipo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_terceros_tipo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_tipo_onfocus(this, iSeqRow) });
  $('#id_sc_field_cliente' + iSeqRow).bind('blur', function() { sc_terceros_cliente_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_cliente_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_empleado' + iSeqRow).bind('blur', function() { sc_terceros_empleado_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_empleado_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_empleado_onfocus(this, iSeqRow) });
  $('#id_sc_field_proveedor' + iSeqRow).bind('blur', function() { sc_terceros_proveedor_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_proveedor_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_proveedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_contacto' + iSeqRow).bind('blur', function() { sc_terceros_contacto_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_contacto_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_contacto_onfocus(this, iSeqRow) });
  $('#id_sc_field_telefonos_prov' + iSeqRow).bind('blur', function() { sc_terceros_telefonos_prov_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_telefonos_prov_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_telefonos_prov_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_terceros_email_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_terceros_email_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_terceros_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_url' + iSeqRow).bind('blur', function() { sc_terceros_url_onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_terceros_url_onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_terceros_url_onfocus(this, iSeqRow) });
  $('#id_sc_field_creditoprov' + iSeqRow).bind('blur', function() { sc_terceros_creditoprov_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_terceros_creditoprov_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_terceros_creditoprov_onfocus(this, iSeqRow) });
  $('#id_sc_field_dias' + iSeqRow).bind('blur', function() { sc_terceros_dias_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_terceros_dias_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_dias_onfocus(this, iSeqRow) });
  $('#id_sc_field_fechultcomp' + iSeqRow).bind('blur', function() { sc_terceros_fechultcomp_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_terceros_fechultcomp_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_terceros_fechultcomp_onfocus(this, iSeqRow) });
  $('#id_sc_field_saldoapagar' + iSeqRow).bind('blur', function() { sc_terceros_saldoapagar_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_terceros_saldoapagar_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_terceros_saldoapagar_onfocus(this, iSeqRow) });
  $('#id_sc_field_autoretenedor' + iSeqRow).bind('blur', function() { sc_terceros_autoretenedor_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_autoretenedor_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_autoretenedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_tipo_documento' + iSeqRow).bind('blur', function() { sc_terceros_tipo_documento_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_tipo_documento_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_tipo_documento_onfocus(this, iSeqRow) });
  $('#id_sc_field_dv' + iSeqRow).bind('blur', function() { sc_terceros_dv_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_terceros_dv_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_terceros_dv_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre1' + iSeqRow).bind('blur', function() { sc_terceros_nombre1_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_nombre1_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_nombre1_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre2' + iSeqRow).bind('blur', function() { sc_terceros_nombre2_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_nombre2_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_nombre2_onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido1' + iSeqRow).bind('blur', function() { sc_terceros_apellido1_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_apellido1_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_apellido1_onfocus(this, iSeqRow) });
  $('#id_sc_field_apellido2' + iSeqRow).bind('blur', function() { sc_terceros_apellido2_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_apellido2_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_apellido2_onfocus(this, iSeqRow) });
  $('#id_sc_field_sucur_cliente' + iSeqRow).bind('blur', function() { sc_terceros_sucur_cliente_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_sucur_cliente_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_sucur_cliente_onfocus(this, iSeqRow) });
  $('#id_sc_field_representante' + iSeqRow).bind('blur', function() { sc_terceros_representante_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_representante_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_representante_onfocus(this, iSeqRow) });
  $('#id_sc_field_imagenter' + iSeqRow).bind('change', function() { sc_terceros_imagenter_onchange(this, iSeqRow) });
  $('#id_sc_field_es_restaurante' + iSeqRow).bind('blur', function() { sc_terceros_es_restaurante_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_es_restaurante_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_es_restaurante_onfocus(this, iSeqRow) });
  $('#id_sc_field_dias_credito' + iSeqRow).bind('blur', function() { sc_terceros_dias_credito_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_terceros_dias_credito_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_terceros_dias_credito_onfocus(this, iSeqRow) });
  $('#id_sc_field_dias_mora' + iSeqRow).bind('blur', function() { sc_terceros_dias_mora_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_dias_mora_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_dias_mora_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupo_vendedor' + iSeqRow).bind('blur', function() { sc_terceros_cupo_vendedor_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_cupo_vendedor_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_cupo_vendedor_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_ter' + iSeqRow).bind('blur', function() { sc_terceros_codigo_ter_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_codigo_ter_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_codigo_ter_onfocus(this, iSeqRow) });
  $('#id_sc_field_es_cajero' + iSeqRow).bind('blur', function() { sc_terceros_es_cajero_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_es_cajero_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_es_cajero_onfocus(this, iSeqRow) });
  $('#id_sc_field_autorizado' + iSeqRow).bind('blur', function() { sc_terceros_autorizado_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_autorizado_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_autorizado_onfocus(this, iSeqRow) });
  $('#id_sc_field_zona_clientes' + iSeqRow).bind('blur', function() { sc_terceros_zona_clientes_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_zona_clientes_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_zona_clientes_onfocus(this, iSeqRow) });
  $('#id_sc_field_clasificacion_clientes' + iSeqRow).bind('blur', function() { sc_terceros_clasificacion_clientes_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_terceros_clasificacion_clientes_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_terceros_clasificacion_clientes_onfocus(this, iSeqRow) });
  $('#id_sc_field_creado' + iSeqRow).bind('change', function() { sc_terceros_creado_onchange(this, iSeqRow) });
  $('#id_sc_field_creado_hora' + iSeqRow).bind('change', function() { sc_terceros_creado_hora_onchange(this, iSeqRow) });
  $('#id_sc_field_disponible' + iSeqRow).bind('change', function() { sc_terceros_disponible_onchange(this, iSeqRow) });
  $('#id_sc_field_id_pedido_tmp' + iSeqRow).bind('change', function() { sc_terceros_id_pedido_tmp_onchange(this, iSeqRow) });
  $('#id_sc_field_n_pedido_tmp' + iSeqRow).bind('change', function() { sc_terceros_n_pedido_tmp_onchange(this, iSeqRow) });
  $('#id_sc_field_total_pedido_tmp' + iSeqRow).bind('change', function() { sc_terceros_total_pedido_tmp_onchange(this, iSeqRow) });
  $('#id_sc_field_obs_pedido_tmp' + iSeqRow).bind('change', function() { sc_terceros_obs_pedido_tmp_onchange(this, iSeqRow) });
  $('#id_sc_field_vend_pedido_tmp' + iSeqRow).bind('change', function() { sc_terceros_vend_pedido_tmp_onchange(this, iSeqRow) });
  $('#id_sc_field_ciudad' + iSeqRow).bind('blur', function() { sc_terceros_ciudad_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_terceros_ciudad_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_terceros_ciudad_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_postal' + iSeqRow).bind('blur', function() { sc_terceros_codigo_postal_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_terceros_codigo_postal_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_terceros_codigo_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_lenguaje' + iSeqRow).bind('blur', function() { sc_terceros_lenguaje_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_lenguaje_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_lenguaje_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_comercil' + iSeqRow).bind('blur', function() { sc_terceros_nombre_comercil_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_terceros_nombre_comercil_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_terceros_nombre_comercil_onfocus(this, iSeqRow) });
  $('#id_sc_field_notificar' + iSeqRow).bind('blur', function() { sc_terceros_notificar_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_notificar_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_notificar_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc_auxiliar_deudores' + iSeqRow).bind('blur', function() { sc_terceros_puc_auxiliar_deudores_onblur(this, iSeqRow) })
                                                   .bind('change', function() { sc_terceros_puc_auxiliar_deudores_onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_terceros_puc_auxiliar_deudores_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc_retefuente_ventas' + iSeqRow).bind('blur', function() { sc_terceros_puc_retefuente_ventas_onblur(this, iSeqRow) })
                                                   .bind('change', function() { sc_terceros_puc_retefuente_ventas_onchange(this, iSeqRow) })
                                                   .bind('focus', function() { sc_terceros_puc_retefuente_ventas_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc_retefuente_servicios_clie' + iSeqRow).bind('blur', function() { sc_terceros_puc_retefuente_servicios_clie_onblur(this, iSeqRow) })
                                                           .bind('change', function() { sc_terceros_puc_retefuente_servicios_clie_onchange(this, iSeqRow) })
                                                           .bind('focus', function() { sc_terceros_puc_retefuente_servicios_clie_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc_auxiliar_proveedores' + iSeqRow).bind('blur', function() { sc_terceros_puc_auxiliar_proveedores_onblur(this, iSeqRow) })
                                                      .bind('change', function() { sc_terceros_puc_auxiliar_proveedores_onchange(this, iSeqRow) })
                                                      .bind('focus', function() { sc_terceros_puc_auxiliar_proveedores_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc_retefuente_compras' + iSeqRow).bind('blur', function() { sc_terceros_puc_retefuente_compras_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_terceros_puc_retefuente_compras_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_terceros_puc_retefuente_compras_onfocus(this, iSeqRow) });
  $('#id_sc_field_puc_retefuente_servicios_prov' + iSeqRow).bind('blur', function() { sc_terceros_puc_retefuente_servicios_prov_onblur(this, iSeqRow) })
                                                           .bind('change', function() { sc_terceros_puc_retefuente_servicios_prov_onchange(this, iSeqRow) })
                                                           .bind('focus', function() { sc_terceros_puc_retefuente_servicios_prov_onfocus(this, iSeqRow) });
  $('#id_sc_field_nube' + iSeqRow).bind('change', function() { sc_terceros_nube_onchange(this, iSeqRow) });
  $('#id_sc_field_latitude' + iSeqRow).bind('change', function() { sc_terceros_latitude_onchange(this, iSeqRow) });
  $('#id_sc_field_longitude' + iSeqRow).bind('change', function() { sc_terceros_longitude_onchange(this, iSeqRow) });
  $('#id_sc_field_activo' + iSeqRow).bind('blur', function() { sc_terceros_activo_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_terceros_activo_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_terceros_activo_onfocus(this, iSeqRow) });
  $('#id_sc_field_es_tecnico' + iSeqRow).bind('blur', function() { sc_terceros_es_tecnico_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_es_tecnico_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_es_tecnico_onfocus(this, iSeqRow) });
  $('#id_sc_field_codigo_tercero' + iSeqRow).bind('blur', function() { sc_terceros_codigo_tercero_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_codigo_tercero_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_codigo_tercero_onfocus(this, iSeqRow) });
  $('#id_sc_field_porcentaje_propina_sugerida' + iSeqRow).bind('blur', function() { sc_terceros_porcentaje_propina_sugerida_onblur(this, iSeqRow) })
                                                         .bind('change', function() { sc_terceros_porcentaje_propina_sugerida_onchange(this, iSeqRow) })
                                                         .bind('focus', function() { sc_terceros_porcentaje_propina_sugerida_onfocus(this, iSeqRow) });
  $('#id_sc_field_correo_notificafe' + iSeqRow).bind('blur', function() { sc_terceros_correo_notificafe_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_terceros_correo_notificafe_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_terceros_correo_notificafe_onfocus(this, iSeqRow) });
  $('#id_sc_field_celular_notificafe' + iSeqRow).bind('blur', function() { sc_terceros_celular_notificafe_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_terceros_celular_notificafe_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_terceros_celular_notificafe_onfocus(this, iSeqRow) });
  $('#id_sc_field_archivo_cedula' + iSeqRow).bind('blur', function() { sc_terceros_archivo_cedula_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_archivo_cedula_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_archivo_cedula_onfocus(this, iSeqRow) });
  $('#id_sc_field_archivo_rut' + iSeqRow).bind('blur', function() { sc_terceros_archivo_rut_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_terceros_archivo_rut_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_terceros_archivo_rut_onfocus(this, iSeqRow) });
  $('#id_sc_field_archivo_nit' + iSeqRow).bind('blur', function() { sc_terceros_archivo_nit_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_terceros_archivo_nit_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_terceros_archivo_nit_onfocus(this, iSeqRow) });
  $('#id_sc_field_archivo_pago' + iSeqRow).bind('blur', function() { sc_terceros_archivo_pago_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_terceros_archivo_pago_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_terceros_archivo_pago_onfocus(this, iSeqRow) });
  $('#id_sc_field_id_plan' + iSeqRow).bind('blur', function() { sc_terceros_id_plan_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_id_plan_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_id_plan_onfocus(this, iSeqRow) });
  $('#id_sc_field_valor_plan' + iSeqRow).bind('blur', function() { sc_terceros_valor_plan_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_terceros_valor_plan_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_terceros_valor_plan_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_registro_fe' + iSeqRow).bind('blur', function() { sc_terceros_fecha_registro_fe_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_terceros_fecha_registro_fe_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_terceros_fecha_registro_fe_onfocus(this, iSeqRow) });
  $('#id_sc_field_fecha_registro_fe_hora' + iSeqRow).bind('blur', function() { sc_terceros_fecha_registro_fe_hora_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_terceros_fecha_registro_fe_hora_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_terceros_fecha_registro_fe_hora_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_contador' + iSeqRow).bind('blur', function() { sc_terceros_nombre_contador_onblur(this, iSeqRow) })
                                             .bind('change', function() { sc_terceros_nombre_contador_onchange(this, iSeqRow) })
                                             .bind('focus', function() { sc_terceros_nombre_contador_onfocus(this, iSeqRow) });
  $('#id_sc_field_estado' + iSeqRow).bind('blur', function() { sc_terceros_estado_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_terceros_estado_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_terceros_estado_onfocus(this, iSeqRow) });
  $('#id_sc_field_si_nomina' + iSeqRow).bind('blur', function() { sc_terceros_si_nomina_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_terceros_si_nomina_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_terceros_si_nomina_onfocus(this, iSeqRow) });
  $('#id_sc_field_si_factura_electronica' + iSeqRow).bind('blur', function() { sc_terceros_si_factura_electronica_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_terceros_si_factura_electronica_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_terceros_si_factura_electronica_onfocus(this, iSeqRow) });
  $('#id_sc_field_nombre_empresa_bd' + iSeqRow).bind('blur', function() { sc_terceros_nombre_empresa_bd_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_terceros_nombre_empresa_bd_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_terceros_nombre_empresa_bd_onfocus(this, iSeqRow) });
  $('#id_sc_field_n_trabajadores' + iSeqRow).bind('blur', function() { sc_terceros_n_trabajadores_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_terceros_n_trabajadores_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_terceros_n_trabajadores_onfocus(this, iSeqRow) });
  $('#id_sc_field_archivos' + iSeqRow).bind('blur', function() { sc_terceros_archivos_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_archivos_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_archivos_onfocus(this, iSeqRow) });
  $('#id_sc_field_c_postal' + iSeqRow).bind('blur', function() { sc_terceros_c_postal_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_c_postal_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_c_postal_onfocus(this, iSeqRow) });
  $('#id_sc_field_ciiu' + iSeqRow).bind('blur', function() { sc_terceros_ciiu_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_terceros_ciiu_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_terceros_ciiu_onfocus(this, iSeqRow) });
  $('#id_sc_field_cupodis' + iSeqRow).bind('blur', function() { sc_terceros_cupodis_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_terceros_cupodis_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_terceros_cupodis_onfocus(this, iSeqRow) });
  $('#id_sc_field_departamento' + iSeqRow).bind('blur', function() { sc_terceros_departamento_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_terceros_departamento_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_terceros_departamento_onfocus(this, iSeqRow) });
  $('#id_sc_field_detalle_tributario' + iSeqRow).bind('blur', function() { sc_terceros_detalle_tributario_onblur(this, iSeqRow) })
                                                .bind('change', function() { sc_terceros_detalle_tributario_onchange(this, iSeqRow) })
                                                .bind('focus', function() { sc_terceros_detalle_tributario_onfocus(this, iSeqRow) });
  $('#id_sc_field_r_social' + iSeqRow).bind('blur', function() { sc_terceros_r_social_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_r_social_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_r_social_onfocus(this, iSeqRow) });
  $('#id_sc_field_relleno2' + iSeqRow).bind('blur', function() { sc_terceros_relleno2_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_terceros_relleno2_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_terceros_relleno2_onfocus(this, iSeqRow) });
  $('#id_sc_field_responsabilidad_fiscal' + iSeqRow).bind('blur', function() { sc_terceros_responsabilidad_fiscal_onblur(this, iSeqRow) })
                                                    .bind('change', function() { sc_terceros_responsabilidad_fiscal_onchange(this, iSeqRow) })
                                                    .bind('focus', function() { sc_terceros_responsabilidad_fiscal_onfocus(this, iSeqRow) });
  $('#id_sc_field_sucursales' + iSeqRow).bind('change', function() { sc_terceros_sucursales_onchange(this, iSeqRow) });
  $('#id_sc_field_direcciones' + iSeqRow).bind('blur', function() { sc_terceros_direcciones_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_terceros_direcciones_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_terceros_direcciones_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-notificar' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-cliente' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-proveedor' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-empleado' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-es_tecnico' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-activo' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-autorizado' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-sucur_cliente' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-es_cajero' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-si_nomina' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-si_factura_electronica' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-es_restaurante' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_terceros_idtercero_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_idtercero();
  scCssBlur(oThis);
}

function sc_terceros_idtercero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_idtercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_documento_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_documento();
  scCssBlur(oThis);
}

function sc_terceros_documento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_documento_onchange();
}

function sc_terceros_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_nombres_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_nombres();
  scCssBlur(oThis);
  do_ajax_terceros_event_nombres_onblur();
}

function sc_terceros_nombres_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_nombres_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
  do_ajax_terceros_event_nombres_onfocus();
}

function sc_terceros_direccion_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_direccion();
  scCssBlur(oThis);
}

function sc_terceros_direccion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_direccion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_tel_cel_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_tel_cel();
  scCssBlur(oThis);
}

function sc_terceros_tel_cel_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_tel_cel_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_nacimiento_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_nacimiento();
  scCssBlur(oThis);
}

function sc_terceros_nacimiento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_nacimiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_sexo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_sexo();
  scCssBlur(oThis);
}

function sc_terceros_sexo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_sexo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_urlmail_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_urlmail();
  scCssBlur(oThis);
}

function sc_terceros_urlmail_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_urlmail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_fechault_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_fechault();
  scCssBlur(oThis);
}

function sc_terceros_fechault_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_fechault_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_saldo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_saldo();
  scCssBlur(oThis);
}

function sc_terceros_saldo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_saldo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_afiliacion_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_afiliacion();
  scCssBlur(oThis);
}

function sc_terceros_afiliacion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_afiliacion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_idmuni_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_idmuni();
  scCssBlur(oThis);
}

function sc_terceros_idmuni_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_refresh_idmuni();
}

function sc_terceros_idmuni_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_observaciones_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_observaciones();
  scCssBlur(oThis);
}

function sc_terceros_observaciones_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_observaciones_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_credito_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_credito();
  scCssBlur(oThis);
}

function sc_terceros_credito_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_credito_onchange();
}

function sc_terceros_credito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cupo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_cupo();
  scCssBlur(oThis);
}

function sc_terceros_cupo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_cupo_onchange();
}

function sc_terceros_cupo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_listaprecios_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_listaprecios();
  scCssBlur(oThis);
}

function sc_terceros_listaprecios_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_listaprecios_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_loatiende_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_loatiende();
  scCssBlur(oThis);
}

function sc_terceros_loatiende_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_loatiende_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_con_actual_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_con_actual_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_efec_retencion_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_efec_retencion();
  scCssBlur(oThis);
}

function sc_terceros_efec_retencion_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_efec_retencion_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_regimen_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_regimen();
  scCssBlur(oThis);
}

function sc_terceros_regimen_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_regimen_onchange();
}

function sc_terceros_regimen_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_tipo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_tipo();
  scCssBlur(oThis);
}

function sc_terceros_tipo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_tipo_onchange();
}

function sc_terceros_tipo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cliente_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_cliente();
  scCssBlur(oThis);
}

function sc_terceros_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_cliente_onchange();
}

function sc_terceros_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_empleado_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_empleado();
  scCssBlur(oThis);
}

function sc_terceros_empleado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_empleado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_proveedor_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_proveedor();
  scCssBlur(oThis);
}

function sc_terceros_proveedor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_proveedor_onchange();
}

function sc_terceros_proveedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_contacto_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_contacto();
  scCssBlur(oThis);
}

function sc_terceros_contacto_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_contacto_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_telefonos_prov_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_telefonos_prov();
  scCssBlur(oThis);
}

function sc_terceros_telefonos_prov_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_telefonos_prov_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_email_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_email();
  scCssBlur(oThis);
}

function sc_terceros_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_url_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_url();
  scCssBlur(oThis);
}

function sc_terceros_url_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_url_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_creditoprov_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_creditoprov();
  scCssBlur(oThis);
}

function sc_terceros_creditoprov_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_creditoprov_onchange();
}

function sc_terceros_creditoprov_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_dias_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_dias();
  scCssBlur(oThis);
}

function sc_terceros_dias_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_dias_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_fechultcomp_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_fechultcomp();
  scCssBlur(oThis);
}

function sc_terceros_fechultcomp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_fechultcomp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_saldoapagar_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_saldoapagar();
  scCssBlur(oThis);
}

function sc_terceros_saldoapagar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_saldoapagar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_autoretenedor_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_autoretenedor();
  scCssBlur(oThis);
}

function sc_terceros_autoretenedor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_autoretenedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_tipo_documento_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_tipo_documento();
  scCssBlur(oThis);
}

function sc_terceros_tipo_documento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_tipo_documento_onchange();
}

function sc_terceros_tipo_documento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_dv_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_dv();
  scCssBlur(oThis);
}

function sc_terceros_dv_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_dv_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_nombre1_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_nombre1();
  scCssBlur(oThis);
}

function sc_terceros_nombre1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_nombre1_onchange();
}

function sc_terceros_nombre1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_nombre2_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_nombre2();
  scCssBlur(oThis);
}

function sc_terceros_nombre2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_nombre2_onchange();
}

function sc_terceros_nombre2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_apellido1_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_apellido1();
  scCssBlur(oThis);
}

function sc_terceros_apellido1_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_apellido1_onchange();
}

function sc_terceros_apellido1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_apellido2_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_apellido2();
  scCssBlur(oThis);
}

function sc_terceros_apellido2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_apellido2_onchange();
}

function sc_terceros_apellido2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_sucur_cliente_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_sucur_cliente();
  scCssBlur(oThis);
}

function sc_terceros_sucur_cliente_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_sucur_cliente_onchange();
}

function sc_terceros_sucur_cliente_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_representante_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_representante();
  scCssBlur(oThis);
}

function sc_terceros_representante_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_representante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_imagenter_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_es_restaurante_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_es_restaurante();
  scCssBlur(oThis);
}

function sc_terceros_es_restaurante_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_es_restaurante_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_dias_credito_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_dias_credito();
  scCssBlur(oThis);
}

function sc_terceros_dias_credito_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_dias_credito_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_dias_mora_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_dias_mora();
  scCssBlur(oThis);
}

function sc_terceros_dias_mora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_dias_mora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cupo_vendedor_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_cupo_vendedor();
  scCssBlur(oThis);
}

function sc_terceros_cupo_vendedor_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_cupo_vendedor_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_codigo_ter_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_codigo_ter();
  scCssBlur(oThis);
}

function sc_terceros_codigo_ter_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_codigo_ter_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_es_cajero_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_es_cajero();
  scCssBlur(oThis);
}

function sc_terceros_es_cajero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_es_cajero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_autorizado_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_autorizado();
  scCssBlur(oThis);
}

function sc_terceros_autorizado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_autorizado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_zona_clientes_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_zona_clientes();
  scCssBlur(oThis);
}

function sc_terceros_zona_clientes_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_zona_clientes_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_clasificacion_clientes_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_clasificacion_clientes();
  scCssBlur(oThis);
}

function sc_terceros_clasificacion_clientes_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_clasificacion_clientes_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_creado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_creado_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_disponible_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_id_pedido_tmp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_n_pedido_tmp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_total_pedido_tmp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_obs_pedido_tmp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_vend_pedido_tmp_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_ciudad_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_ciudad();
  scCssBlur(oThis);
}

function sc_terceros_ciudad_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_ciudad_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_codigo_postal_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_codigo_postal();
  scCssBlur(oThis);
}

function sc_terceros_codigo_postal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_codigo_postal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_lenguaje_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_lenguaje();
  scCssBlur(oThis);
}

function sc_terceros_lenguaje_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_lenguaje_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_nombre_comercil_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_nombre_comercil();
  scCssBlur(oThis);
}

function sc_terceros_nombre_comercil_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_nombre_comercil_onchange();
}

function sc_terceros_nombre_comercil_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_notificar_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_notificar();
  scCssBlur(oThis);
}

function sc_terceros_notificar_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_notificar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_puc_auxiliar_deudores_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_puc_auxiliar_deudores();
  scCssBlur(oThis);
}

function sc_terceros_puc_auxiliar_deudores_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_puc_auxiliar_deudores_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_puc_retefuente_ventas_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_puc_retefuente_ventas();
  scCssBlur(oThis);
}

function sc_terceros_puc_retefuente_ventas_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_puc_retefuente_ventas_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_puc_retefuente_servicios_clie_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_puc_retefuente_servicios_clie();
  scCssBlur(oThis);
}

function sc_terceros_puc_retefuente_servicios_clie_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_puc_retefuente_servicios_clie_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_puc_auxiliar_proveedores_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_puc_auxiliar_proveedores();
  scCssBlur(oThis);
}

function sc_terceros_puc_auxiliar_proveedores_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_puc_auxiliar_proveedores_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_puc_retefuente_compras_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_puc_retefuente_compras();
  scCssBlur(oThis);
}

function sc_terceros_puc_retefuente_compras_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_puc_retefuente_compras_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_puc_retefuente_servicios_prov_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_puc_retefuente_servicios_prov();
  scCssBlur(oThis);
}

function sc_terceros_puc_retefuente_servicios_prov_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_puc_retefuente_servicios_prov_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_nube_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_latitude_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_longitude_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_activo_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_activo();
  scCssBlur(oThis);
}

function sc_terceros_activo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_activo_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_es_tecnico_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_es_tecnico();
  scCssBlur(oThis);
}

function sc_terceros_es_tecnico_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_es_tecnico_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_codigo_tercero_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_codigo_tercero();
  scCssBlur(oThis);
}

function sc_terceros_codigo_tercero_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_codigo_tercero_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_porcentaje_propina_sugerida_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_porcentaje_propina_sugerida();
  scCssBlur(oThis);
}

function sc_terceros_porcentaje_propina_sugerida_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_porcentaje_propina_sugerida_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_correo_notificafe_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_correo_notificafe();
  scCssBlur(oThis);
}

function sc_terceros_correo_notificafe_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_correo_notificafe_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_celular_notificafe_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_celular_notificafe();
  scCssBlur(oThis);
}

function sc_terceros_celular_notificafe_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_celular_notificafe_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_archivo_cedula_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_terceros_archivo_cedula_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_archivo_cedula_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_archivo_rut_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_terceros_archivo_rut_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_archivo_rut_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_archivo_nit_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_terceros_archivo_nit_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_archivo_nit_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_archivo_pago_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_terceros_archivo_pago_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_archivo_pago_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_terceros_id_plan_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_id_plan();
  scCssBlur(oThis);
}

function sc_terceros_id_plan_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_id_plan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_valor_plan_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_valor_plan();
  scCssBlur(oThis);
}

function sc_terceros_valor_plan_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_valor_plan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_fecha_registro_fe_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_fecha_registro_fe();
  scCssBlur(oThis);
}

function sc_terceros_fecha_registro_fe_hora_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_fecha_registro_fe();
  scCssBlur(oThis);
}

function sc_terceros_fecha_registro_fe_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_fecha_registro_fe_hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_fecha_registro_fe_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_fecha_registro_fe_hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_nombre_contador_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_nombre_contador();
  scCssBlur(oThis);
}

function sc_terceros_nombre_contador_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_nombre_contador_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_estado_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_estado();
  scCssBlur(oThis);
}

function sc_terceros_estado_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_estado_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_si_nomina_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_si_nomina();
  scCssBlur(oThis);
}

function sc_terceros_si_nomina_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_si_nomina_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_si_factura_electronica_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_si_factura_electronica();
  scCssBlur(oThis);
}

function sc_terceros_si_factura_electronica_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_si_factura_electronica_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_nombre_empresa_bd_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_nombre_empresa_bd();
  scCssBlur(oThis);
}

function sc_terceros_nombre_empresa_bd_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_nombre_empresa_bd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_n_trabajadores_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_n_trabajadores();
  scCssBlur(oThis);
}

function sc_terceros_n_trabajadores_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_n_trabajadores_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_archivos_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_archivos();
  scCssBlur(oThis);
}

function sc_terceros_archivos_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_archivos_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_c_postal_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_c_postal();
  scCssBlur(oThis);
}

function sc_terceros_c_postal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_c_postal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_ciiu_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_ciiu();
  scCssBlur(oThis);
}

function sc_terceros_ciiu_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_ciiu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_cupodis_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_cupodis();
  scCssBlur(oThis);
}

function sc_terceros_cupodis_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_cupodis_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_departamento_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_departamento();
  scCssBlur(oThis);
}

function sc_terceros_departamento_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_refresh_departamento();
}

function sc_terceros_departamento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_detalle_tributario_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_detalle_tributario();
  scCssBlur(oThis);
}

function sc_terceros_detalle_tributario_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_detalle_tributario_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_r_social_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_r_social();
  scCssBlur(oThis);
}

function sc_terceros_r_social_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_terceros_event_r_social_onchange();
}

function sc_terceros_r_social_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_relleno2_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_relleno2();
  scCssBlur(oThis);
}

function sc_terceros_relleno2_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_relleno2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_responsabilidad_fiscal_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_responsabilidad_fiscal();
  scCssBlur(oThis);
}

function sc_terceros_responsabilidad_fiscal_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_responsabilidad_fiscal_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_terceros_sucursales_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_direcciones_onblur(oThis, iSeqRow) {
  do_ajax_terceros_validate_direcciones();
  scCssBlur(oThis);
}

function sc_terceros_direcciones_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_terceros_direcciones_onfocus(oThis, iSeqRow) {
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
	if ("4" == page) {
		displayChange_page_4(status);
	}
	if ("5" == page) {
		displayChange_page_5(status);
	}
	if ("6" == page) {
		displayChange_page_6(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
	displayChange_block("2", status);
	displayChange_block("3", status);
	displayChange_block("4", status);
	displayChange_block("5", status);
}

function displayChange_page_1(status) {
	displayChange_block("6", status);
	displayChange_block("7", status);
	displayChange_block("8", status);
	displayChange_block("9", status);
	displayChange_block("10", status);
}

function displayChange_page_2(status) {
	displayChange_block("11", status);
}

function displayChange_page_3(status) {
	displayChange_block("12", status);
	displayChange_block("13", status);
	displayChange_block("14", status);
}

function displayChange_page_4(status) {
	displayChange_block("15", status);
	displayChange_block("16", status);
	displayChange_block("17", status);
}

function displayChange_page_5(status) {
	displayChange_block("18", status);
}

function displayChange_page_6(status) {
	displayChange_block("19", status);
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
	if ("8" == block) {
		displayChange_block_8(status);
	}
	if ("9" == block) {
		displayChange_block_9(status);
	}
	if ("10" == block) {
		displayChange_block_10(status);
	}
	if ("11" == block) {
		displayChange_block_11(status);
	}
	if ("12" == block) {
		displayChange_block_12(status);
	}
	if ("13" == block) {
		displayChange_block_13(status);
	}
	if ("14" == block) {
		displayChange_block_14(status);
	}
	if ("15" == block) {
		displayChange_block_15(status);
	}
	if ("16" == block) {
		displayChange_block_16(status);
	}
	if ("17" == block) {
		displayChange_block_17(status);
	}
	if ("18" == block) {
		displayChange_block_18(status);
	}
	if ("19" == block) {
		displayChange_block_19(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tipo", "", status);
	displayChange_field("regimen", "", status);
	displayChange_field("tipo_documento", "", status);
	displayChange_field("documento", "", status);
	displayChange_field("dv", "", status);
	displayChange_field("codigo_tercero", "", status);
	displayChange_field("sexo", "", status);
	displayChange_field("notificar", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("nombre1", "", status);
	displayChange_field("nombre2", "", status);
	displayChange_field("apellido1", "", status);
	displayChange_field("apellido2", "", status);
	displayChange_field("tel_cel", "", status);
	displayChange_field("urlmail", "", status);
	displayChange_field("idtercero", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("r_social", "", status);
	displayChange_field("nombres", "", status);
	displayChange_field("nombre_comercil", "", status);
	displayChange_field("representante", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("direccion", "", status);
	displayChange_field("departamento", "", status);
	displayChange_field("idmuni", "", status);
	displayChange_field("ciudad", "", status);
	displayChange_field("codigo_postal", "", status);
	displayChange_field("observaciones", "", status);
	displayChange_field("lenguaje", "", status);
	displayChange_field("c_postal", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("correo_notificafe", "", status);
	displayChange_field("celular_notificafe", "", status);
}

function displayChange_block_5(status) {
	displayChange_field("cliente", "", status);
	displayChange_field("proveedor", "", status);
	displayChange_field("empleado", "", status);
	displayChange_field("es_tecnico", "", status);
	displayChange_field("activo", "", status);
}

function displayChange_block_6(status) {
	displayChange_field("credito", "", status);
	displayChange_field("cupo", "", status);
	displayChange_field("cupodis", "", status);
	displayChange_field("dias_credito", "", status);
	displayChange_field("dias_mora", "", status);
	displayChange_field("efec_retencion", "", status);
	displayChange_field("listaprecios", "", status);
	displayChange_field("loatiende", "", status);
	displayChange_field("autorizado", "", status);
	displayChange_field("relleno2", "", status);
}

function displayChange_block_7(status) {
	displayChange_field("direcciones", "", status);
	displayChange_field("sucur_cliente", "", status);
}

function displayChange_block_8(status) {
	displayChange_field("detalle_tributario", "", status);
	displayChange_field("responsabilidad_fiscal", "", status);
	displayChange_field("ciiu", "", status);
}

function displayChange_block_9(status) {
	displayChange_field("nacimiento", "", status);
}

function displayChange_block_10(status) {
	displayChange_field("fechault", "", status);
	displayChange_field("saldo", "", status);
	displayChange_field("afiliacion", "", status);
}

function displayChange_block_11(status) {
	displayChange_field("es_cajero", "", status);
	displayChange_field("cupo_vendedor", "", status);
}

function displayChange_block_12(status) {
	displayChange_field("autoretenedor", "", status);
	displayChange_field("creditoprov", "", status);
	displayChange_field("dias", "", status);
}

function displayChange_block_13(status) {
	displayChange_field("url", "", status);
	displayChange_field("contacto", "", status);
	displayChange_field("telefonos_prov", "", status);
	displayChange_field("email", "", status);
}

function displayChange_block_14(status) {
	displayChange_field("fechultcomp", "", status);
	displayChange_field("saldoapagar", "", status);
}

function displayChange_block_15(status) {
	displayChange_field("codigo_ter", "", status);
	displayChange_field("zona_clientes", "", status);
	displayChange_field("clasificacion_clientes", "", status);
}

function displayChange_block_16(status) {
	displayChange_field("puc_auxiliar_deudores", "", status);
	displayChange_field("puc_retefuente_ventas", "", status);
	displayChange_field("puc_retefuente_servicios_clie", "", status);
	displayChange_field("puc_auxiliar_proveedores", "", status);
	displayChange_field("puc_retefuente_compras", "", status);
	displayChange_field("puc_retefuente_servicios_prov", "", status);
}

function displayChange_block_17(status) {
	displayChange_field("archivo_cedula", "", status);
	displayChange_field("archivo_rut", "", status);
	displayChange_field("archivo_nit", "", status);
	displayChange_field("archivo_pago", "", status);
	displayChange_field("id_plan", "", status);
	displayChange_field("valor_plan", "", status);
	displayChange_field("fecha_registro_fe", "", status);
	displayChange_field("nombre_contador", "", status);
	displayChange_field("estado", "", status);
	displayChange_field("si_nomina", "", status);
	displayChange_field("n_trabajadores", "", status);
	displayChange_field("si_factura_electronica", "", status);
	displayChange_field("nombre_empresa_bd", "", status);
}

function displayChange_block_18(status) {
	displayChange_field("archivos", "", status);
}

function displayChange_block_19(status) {
	displayChange_field("es_restaurante", "", status);
	displayChange_field("porcentaje_propina_sugerida", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tipo(row, status);
	displayChange_field_regimen(row, status);
	displayChange_field_tipo_documento(row, status);
	displayChange_field_documento(row, status);
	displayChange_field_dv(row, status);
	displayChange_field_codigo_tercero(row, status);
	displayChange_field_sexo(row, status);
	displayChange_field_notificar(row, status);
	displayChange_field_nombre1(row, status);
	displayChange_field_nombre2(row, status);
	displayChange_field_apellido1(row, status);
	displayChange_field_apellido2(row, status);
	displayChange_field_tel_cel(row, status);
	displayChange_field_urlmail(row, status);
	displayChange_field_idtercero(row, status);
	displayChange_field_r_social(row, status);
	displayChange_field_nombres(row, status);
	displayChange_field_nombre_comercil(row, status);
	displayChange_field_representante(row, status);
	displayChange_field_direccion(row, status);
	displayChange_field_departamento(row, status);
	displayChange_field_idmuni(row, status);
	displayChange_field_ciudad(row, status);
	displayChange_field_codigo_postal(row, status);
	displayChange_field_observaciones(row, status);
	displayChange_field_lenguaje(row, status);
	displayChange_field_c_postal(row, status);
	displayChange_field_correo_notificafe(row, status);
	displayChange_field_celular_notificafe(row, status);
	displayChange_field_cliente(row, status);
	displayChange_field_proveedor(row, status);
	displayChange_field_empleado(row, status);
	displayChange_field_es_tecnico(row, status);
	displayChange_field_activo(row, status);
	displayChange_field_credito(row, status);
	displayChange_field_cupo(row, status);
	displayChange_field_cupodis(row, status);
	displayChange_field_dias_credito(row, status);
	displayChange_field_dias_mora(row, status);
	displayChange_field_efec_retencion(row, status);
	displayChange_field_listaprecios(row, status);
	displayChange_field_loatiende(row, status);
	displayChange_field_autorizado(row, status);
	displayChange_field_relleno2(row, status);
	displayChange_field_direcciones(row, status);
	displayChange_field_sucur_cliente(row, status);
	displayChange_field_detalle_tributario(row, status);
	displayChange_field_responsabilidad_fiscal(row, status);
	displayChange_field_ciiu(row, status);
	displayChange_field_nacimiento(row, status);
	displayChange_field_fechault(row, status);
	displayChange_field_saldo(row, status);
	displayChange_field_afiliacion(row, status);
	displayChange_field_es_cajero(row, status);
	displayChange_field_cupo_vendedor(row, status);
	displayChange_field_autoretenedor(row, status);
	displayChange_field_creditoprov(row, status);
	displayChange_field_dias(row, status);
	displayChange_field_url(row, status);
	displayChange_field_contacto(row, status);
	displayChange_field_telefonos_prov(row, status);
	displayChange_field_email(row, status);
	displayChange_field_fechultcomp(row, status);
	displayChange_field_saldoapagar(row, status);
	displayChange_field_codigo_ter(row, status);
	displayChange_field_zona_clientes(row, status);
	displayChange_field_clasificacion_clientes(row, status);
	displayChange_field_puc_auxiliar_deudores(row, status);
	displayChange_field_puc_retefuente_ventas(row, status);
	displayChange_field_puc_retefuente_servicios_clie(row, status);
	displayChange_field_puc_auxiliar_proveedores(row, status);
	displayChange_field_puc_retefuente_compras(row, status);
	displayChange_field_puc_retefuente_servicios_prov(row, status);
	displayChange_field_archivo_cedula(row, status);
	displayChange_field_archivo_rut(row, status);
	displayChange_field_archivo_nit(row, status);
	displayChange_field_archivo_pago(row, status);
	displayChange_field_id_plan(row, status);
	displayChange_field_valor_plan(row, status);
	displayChange_field_fecha_registro_fe(row, status);
	displayChange_field_nombre_contador(row, status);
	displayChange_field_estado(row, status);
	displayChange_field_si_nomina(row, status);
	displayChange_field_n_trabajadores(row, status);
	displayChange_field_si_factura_electronica(row, status);
	displayChange_field_nombre_empresa_bd(row, status);
	displayChange_field_archivos(row, status);
	displayChange_field_es_restaurante(row, status);
	displayChange_field_porcentaje_propina_sugerida(row, status);
}

function displayChange_field(field, row, status) {
	if ("tipo" == field) {
		displayChange_field_tipo(row, status);
	}
	if ("regimen" == field) {
		displayChange_field_regimen(row, status);
	}
	if ("tipo_documento" == field) {
		displayChange_field_tipo_documento(row, status);
	}
	if ("documento" == field) {
		displayChange_field_documento(row, status);
	}
	if ("dv" == field) {
		displayChange_field_dv(row, status);
	}
	if ("codigo_tercero" == field) {
		displayChange_field_codigo_tercero(row, status);
	}
	if ("sexo" == field) {
		displayChange_field_sexo(row, status);
	}
	if ("notificar" == field) {
		displayChange_field_notificar(row, status);
	}
	if ("nombre1" == field) {
		displayChange_field_nombre1(row, status);
	}
	if ("nombre2" == field) {
		displayChange_field_nombre2(row, status);
	}
	if ("apellido1" == field) {
		displayChange_field_apellido1(row, status);
	}
	if ("apellido2" == field) {
		displayChange_field_apellido2(row, status);
	}
	if ("tel_cel" == field) {
		displayChange_field_tel_cel(row, status);
	}
	if ("urlmail" == field) {
		displayChange_field_urlmail(row, status);
	}
	if ("idtercero" == field) {
		displayChange_field_idtercero(row, status);
	}
	if ("r_social" == field) {
		displayChange_field_r_social(row, status);
	}
	if ("nombres" == field) {
		displayChange_field_nombres(row, status);
	}
	if ("nombre_comercil" == field) {
		displayChange_field_nombre_comercil(row, status);
	}
	if ("representante" == field) {
		displayChange_field_representante(row, status);
	}
	if ("direccion" == field) {
		displayChange_field_direccion(row, status);
	}
	if ("departamento" == field) {
		displayChange_field_departamento(row, status);
	}
	if ("idmuni" == field) {
		displayChange_field_idmuni(row, status);
	}
	if ("ciudad" == field) {
		displayChange_field_ciudad(row, status);
	}
	if ("codigo_postal" == field) {
		displayChange_field_codigo_postal(row, status);
	}
	if ("observaciones" == field) {
		displayChange_field_observaciones(row, status);
	}
	if ("lenguaje" == field) {
		displayChange_field_lenguaje(row, status);
	}
	if ("c_postal" == field) {
		displayChange_field_c_postal(row, status);
	}
	if ("correo_notificafe" == field) {
		displayChange_field_correo_notificafe(row, status);
	}
	if ("celular_notificafe" == field) {
		displayChange_field_celular_notificafe(row, status);
	}
	if ("cliente" == field) {
		displayChange_field_cliente(row, status);
	}
	if ("proveedor" == field) {
		displayChange_field_proveedor(row, status);
	}
	if ("empleado" == field) {
		displayChange_field_empleado(row, status);
	}
	if ("es_tecnico" == field) {
		displayChange_field_es_tecnico(row, status);
	}
	if ("activo" == field) {
		displayChange_field_activo(row, status);
	}
	if ("credito" == field) {
		displayChange_field_credito(row, status);
	}
	if ("cupo" == field) {
		displayChange_field_cupo(row, status);
	}
	if ("cupodis" == field) {
		displayChange_field_cupodis(row, status);
	}
	if ("dias_credito" == field) {
		displayChange_field_dias_credito(row, status);
	}
	if ("dias_mora" == field) {
		displayChange_field_dias_mora(row, status);
	}
	if ("efec_retencion" == field) {
		displayChange_field_efec_retencion(row, status);
	}
	if ("listaprecios" == field) {
		displayChange_field_listaprecios(row, status);
	}
	if ("loatiende" == field) {
		displayChange_field_loatiende(row, status);
	}
	if ("autorizado" == field) {
		displayChange_field_autorizado(row, status);
	}
	if ("relleno2" == field) {
		displayChange_field_relleno2(row, status);
	}
	if ("direcciones" == field) {
		displayChange_field_direcciones(row, status);
	}
	if ("sucur_cliente" == field) {
		displayChange_field_sucur_cliente(row, status);
	}
	if ("detalle_tributario" == field) {
		displayChange_field_detalle_tributario(row, status);
	}
	if ("responsabilidad_fiscal" == field) {
		displayChange_field_responsabilidad_fiscal(row, status);
	}
	if ("ciiu" == field) {
		displayChange_field_ciiu(row, status);
	}
	if ("nacimiento" == field) {
		displayChange_field_nacimiento(row, status);
	}
	if ("fechault" == field) {
		displayChange_field_fechault(row, status);
	}
	if ("saldo" == field) {
		displayChange_field_saldo(row, status);
	}
	if ("afiliacion" == field) {
		displayChange_field_afiliacion(row, status);
	}
	if ("es_cajero" == field) {
		displayChange_field_es_cajero(row, status);
	}
	if ("cupo_vendedor" == field) {
		displayChange_field_cupo_vendedor(row, status);
	}
	if ("autoretenedor" == field) {
		displayChange_field_autoretenedor(row, status);
	}
	if ("creditoprov" == field) {
		displayChange_field_creditoprov(row, status);
	}
	if ("dias" == field) {
		displayChange_field_dias(row, status);
	}
	if ("url" == field) {
		displayChange_field_url(row, status);
	}
	if ("contacto" == field) {
		displayChange_field_contacto(row, status);
	}
	if ("telefonos_prov" == field) {
		displayChange_field_telefonos_prov(row, status);
	}
	if ("email" == field) {
		displayChange_field_email(row, status);
	}
	if ("fechultcomp" == field) {
		displayChange_field_fechultcomp(row, status);
	}
	if ("saldoapagar" == field) {
		displayChange_field_saldoapagar(row, status);
	}
	if ("codigo_ter" == field) {
		displayChange_field_codigo_ter(row, status);
	}
	if ("zona_clientes" == field) {
		displayChange_field_zona_clientes(row, status);
	}
	if ("clasificacion_clientes" == field) {
		displayChange_field_clasificacion_clientes(row, status);
	}
	if ("puc_auxiliar_deudores" == field) {
		displayChange_field_puc_auxiliar_deudores(row, status);
	}
	if ("puc_retefuente_ventas" == field) {
		displayChange_field_puc_retefuente_ventas(row, status);
	}
	if ("puc_retefuente_servicios_clie" == field) {
		displayChange_field_puc_retefuente_servicios_clie(row, status);
	}
	if ("puc_auxiliar_proveedores" == field) {
		displayChange_field_puc_auxiliar_proveedores(row, status);
	}
	if ("puc_retefuente_compras" == field) {
		displayChange_field_puc_retefuente_compras(row, status);
	}
	if ("puc_retefuente_servicios_prov" == field) {
		displayChange_field_puc_retefuente_servicios_prov(row, status);
	}
	if ("archivo_cedula" == field) {
		displayChange_field_archivo_cedula(row, status);
	}
	if ("archivo_rut" == field) {
		displayChange_field_archivo_rut(row, status);
	}
	if ("archivo_nit" == field) {
		displayChange_field_archivo_nit(row, status);
	}
	if ("archivo_pago" == field) {
		displayChange_field_archivo_pago(row, status);
	}
	if ("id_plan" == field) {
		displayChange_field_id_plan(row, status);
	}
	if ("valor_plan" == field) {
		displayChange_field_valor_plan(row, status);
	}
	if ("fecha_registro_fe" == field) {
		displayChange_field_fecha_registro_fe(row, status);
	}
	if ("nombre_contador" == field) {
		displayChange_field_nombre_contador(row, status);
	}
	if ("estado" == field) {
		displayChange_field_estado(row, status);
	}
	if ("si_nomina" == field) {
		displayChange_field_si_nomina(row, status);
	}
	if ("n_trabajadores" == field) {
		displayChange_field_n_trabajadores(row, status);
	}
	if ("si_factura_electronica" == field) {
		displayChange_field_si_factura_electronica(row, status);
	}
	if ("nombre_empresa_bd" == field) {
		displayChange_field_nombre_empresa_bd(row, status);
	}
	if ("archivos" == field) {
		displayChange_field_archivos(row, status);
	}
	if ("es_restaurante" == field) {
		displayChange_field_es_restaurante(row, status);
	}
	if ("porcentaje_propina_sugerida" == field) {
		displayChange_field_porcentaje_propina_sugerida(row, status);
	}
}

function displayChange_field_tipo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo");
	}
}

function displayChange_field_regimen(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_regimen__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_regimen" + row).select2("destroy");
		}
		scJQSelect2Add(row, "regimen");
	}
}

function displayChange_field_tipo_documento(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tipo_documento__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tipo_documento" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tipo_documento");
	}
}

function displayChange_field_documento(row, status) {
}

function displayChange_field_dv(row, status) {
}

function displayChange_field_codigo_tercero(row, status) {
}

function displayChange_field_sexo(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_sexo__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_sexo" + row).select2("destroy");
		}
		scJQSelect2Add(row, "sexo");
	}
}

function displayChange_field_notificar(row, status) {
}

function displayChange_field_nombre1(row, status) {
}

function displayChange_field_nombre2(row, status) {
}

function displayChange_field_apellido1(row, status) {
}

function displayChange_field_apellido2(row, status) {
}

function displayChange_field_tel_cel(row, status) {
}

function displayChange_field_urlmail(row, status) {
}

function displayChange_field_idtercero(row, status) {
}

function displayChange_field_r_social(row, status) {
}

function displayChange_field_nombres(row, status) {
}

function displayChange_field_nombre_comercil(row, status) {
}

function displayChange_field_representante(row, status) {
}

function displayChange_field_direccion(row, status) {
}

function displayChange_field_departamento(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_departamento__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_departamento" + row).select2("destroy");
		}
		scJQSelect2Add(row, "departamento");
	}
}

function displayChange_field_idmuni(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_idmuni__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_idmuni" + row).select2("destroy");
		}
		scJQSelect2Add(row, "idmuni");
	}
}

function displayChange_field_ciudad(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_ciudad__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_ciudad" + row).select2("destroy");
		}
		scJQSelect2Add(row, "ciudad");
	}
}

function displayChange_field_codigo_postal(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_codigo_postal__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_codigo_postal" + row).select2("destroy");
		}
		scJQSelect2Add(row, "codigo_postal");
	}
}

function displayChange_field_observaciones(row, status) {
}

function displayChange_field_lenguaje(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_lenguaje__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_lenguaje" + row).select2("destroy");
		}
		scJQSelect2Add(row, "lenguaje");
	}
}

function displayChange_field_c_postal(row, status) {
}

function displayChange_field_correo_notificafe(row, status) {
}

function displayChange_field_celular_notificafe(row, status) {
}

function displayChange_field_cliente(row, status) {
}

function displayChange_field_proveedor(row, status) {
}

function displayChange_field_empleado(row, status) {
}

function displayChange_field_es_tecnico(row, status) {
}

function displayChange_field_activo(row, status) {
}

function displayChange_field_credito(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_credito__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_credito" + row).select2("destroy");
		}
		scJQSelect2Add(row, "credito");
	}
}

function displayChange_field_cupo(row, status) {
}

function displayChange_field_cupodis(row, status) {
}

function displayChange_field_dias_credito(row, status) {
}

function displayChange_field_dias_mora(row, status) {
}

function displayChange_field_efec_retencion(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_efec_retencion__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_efec_retencion" + row).select2("destroy");
		}
		scJQSelect2Add(row, "efec_retencion");
	}
}

function displayChange_field_listaprecios(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_listaprecios__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_listaprecios" + row).select2("destroy");
		}
		scJQSelect2Add(row, "listaprecios");
	}
}

function displayChange_field_loatiende(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_loatiende__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_loatiende" + row).select2("destroy");
		}
		scJQSelect2Add(row, "loatiende");
	}
}

function displayChange_field_autorizado(row, status) {
}

function displayChange_field_relleno2(row, status) {
}

function displayChange_field_direcciones(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_direccion")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_direccion")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_sucur_cliente(row, status) {
}

function displayChange_field_detalle_tributario(row, status) {
}

function displayChange_field_responsabilidad_fiscal(row, status) {
}

function displayChange_field_ciiu(row, status) {
}

function displayChange_field_nacimiento(row, status) {
}

function displayChange_field_fechault(row, status) {
}

function displayChange_field_saldo(row, status) {
}

function displayChange_field_afiliacion(row, status) {
}

function displayChange_field_es_cajero(row, status) {
}

function displayChange_field_cupo_vendedor(row, status) {
}

function displayChange_field_autoretenedor(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_autoretenedor__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_autoretenedor" + row).select2("destroy");
		}
		scJQSelect2Add(row, "autoretenedor");
	}
}

function displayChange_field_creditoprov(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_creditoprov__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_creditoprov" + row).select2("destroy");
		}
		scJQSelect2Add(row, "creditoprov");
	}
}

function displayChange_field_dias(row, status) {
}

function displayChange_field_url(row, status) {
}

function displayChange_field_contacto(row, status) {
}

function displayChange_field_telefonos_prov(row, status) {
}

function displayChange_field_email(row, status) {
}

function displayChange_field_fechultcomp(row, status) {
}

function displayChange_field_saldoapagar(row, status) {
}

function displayChange_field_codigo_ter(row, status) {
}

function displayChange_field_zona_clientes(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_zona_clientes__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_zona_clientes" + row).select2("destroy");
		}
		scJQSelect2Add(row, "zona_clientes");
	}
}

function displayChange_field_clasificacion_clientes(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_clasificacion_clientes__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_clasificacion_clientes" + row).select2("destroy");
		}
		scJQSelect2Add(row, "clasificacion_clientes");
	}
}

function displayChange_field_puc_auxiliar_deudores(row, status) {
}

function displayChange_field_puc_retefuente_ventas(row, status) {
}

function displayChange_field_puc_retefuente_servicios_clie(row, status) {
}

function displayChange_field_puc_auxiliar_proveedores(row, status) {
}

function displayChange_field_puc_retefuente_compras(row, status) {
}

function displayChange_field_puc_retefuente_servicios_prov(row, status) {
}

function displayChange_field_archivo_cedula(row, status) {
}

function displayChange_field_archivo_rut(row, status) {
}

function displayChange_field_archivo_nit(row, status) {
}

function displayChange_field_archivo_pago(row, status) {
}

function displayChange_field_id_plan(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_id_plan__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_id_plan" + row).select2("destroy");
		}
		scJQSelect2Add(row, "id_plan");
	}
}

function displayChange_field_valor_plan(row, status) {
}

function displayChange_field_fecha_registro_fe(row, status) {
}

function displayChange_field_nombre_contador(row, status) {
}

function displayChange_field_estado(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_estado__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_estado" + row).select2("destroy");
		}
		scJQSelect2Add(row, "estado");
	}
}

function displayChange_field_si_nomina(row, status) {
}

function displayChange_field_n_trabajadores(row, status) {
}

function displayChange_field_si_factura_electronica(row, status) {
}

function displayChange_field_nombre_empresa_bd(row, status) {
}

function displayChange_field_archivos(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_gestor_archivos_tercero")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_gestor_archivos_tercero")[0].contentWindow.scRecreateSelect2();
	}
}

function displayChange_field_es_restaurante(row, status) {
}

function displayChange_field_porcentaje_propina_sugerida(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_tipo("all", "on");
	displayChange_field_regimen("all", "on");
	displayChange_field_tipo_documento("all", "on");
	displayChange_field_sexo("all", "on");
	displayChange_field_departamento("all", "on");
	displayChange_field_idmuni("all", "on");
	displayChange_field_ciudad("all", "on");
	displayChange_field_codigo_postal("all", "on");
	displayChange_field_lenguaje("all", "on");
	displayChange_field_credito("all", "on");
	displayChange_field_efec_retencion("all", "on");
	displayChange_field_listaprecios("all", "on");
	displayChange_field_loatiende("all", "on");
	displayChange_field_autoretenedor("all", "on");
	displayChange_field_creditoprov("all", "on");
	displayChange_field_zona_clientes("all", "on");
	displayChange_field_clasificacion_clientes("all", "on");
	displayChange_field_id_plan("all", "on");
	displayChange_field_estado("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_terceros_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(16);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_nacimiento" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_nacimiento" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_validate_nacimiento(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-49:c+49',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['nacimiento']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fechault" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fechault" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_validate_fechault(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['fechault']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_afiliacion" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_afiliacion" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      do_ajax_terceros_validate_afiliacion(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['afiliacion']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_fecha_registro_fe" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_fecha_registro_fe" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['fecha_registro_fe']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_registro_fe']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_terceros_validate_fecha_registro_fe(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['fecha_registro_fe']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_con_actual" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_con_actual" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['con_actual']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['con_actual']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_terceros_validate_con_actual(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['con_actual']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
      do_ajax_terceros_validate_creado(iSeqRow);
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
} // scJQCalendarAdd

function scJQLinkReadonlyAdd(iSeqRow) {
  $(".sc-ui-readonly-url" + iSeqRow).click(function() {
    var linkUrl = $(this).html();
    window.open(linkUrl, "_blank");
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", ""); });
} // scJQLinkReadonlyAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_archivo_cedula" + iSeqRow).fileupload({
    datatype: "json",
    url: "terceros_ul_save.php",
    dropZone: $("#hidden_field_data_archivo_cedula" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'archivo_cedula'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_archivo_cedula" + iSeqRow);
        loaderContent = $("#id_img_loader_archivo_cedula" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_archivo_cedula" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_cedula(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_cedula(data);
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
        $("#id_img_loader_archivo_cedula" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_archivo_cedula" + iSeqRow).hide();
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
      $("#id_sc_field_archivo_cedula" + iSeqRow).val("");
      $("#id_sc_field_archivo_cedula_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_archivo_cedula_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_archivo_cedula" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_archivo_cedula" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_archivo_cedula" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_archivo_cedula" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_archivo_rut" + iSeqRow).fileupload({
    datatype: "json",
    url: "terceros_ul_save.php",
    dropZone: $("#hidden_field_data_archivo_rut" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'archivo_rut'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_archivo_rut" + iSeqRow);
        loaderContent = $("#id_img_loader_archivo_rut" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_archivo_rut" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_rut(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_rut(data);
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
        $("#id_img_loader_archivo_rut" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_archivo_rut" + iSeqRow).hide();
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
      $("#id_sc_field_archivo_rut" + iSeqRow).val("");
      $("#id_sc_field_archivo_rut_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_archivo_rut_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_archivo_rut" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_archivo_rut" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_archivo_rut" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_archivo_rut" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_archivo_nit" + iSeqRow).fileupload({
    datatype: "json",
    url: "terceros_ul_save.php",
    dropZone: $("#hidden_field_data_archivo_nit" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'archivo_nit'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_archivo_nit" + iSeqRow);
        loaderContent = $("#id_img_loader_archivo_nit" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_archivo_nit" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_nit(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_nit(data);
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
        $("#id_img_loader_archivo_nit" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_archivo_nit" + iSeqRow).hide();
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
      $("#id_sc_field_archivo_nit" + iSeqRow).val("");
      $("#id_sc_field_archivo_nit_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_archivo_nit_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_archivo_nit" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_archivo_nit" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_archivo_nit" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_archivo_nit" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_archivo_pago" + iSeqRow).fileupload({
    datatype: "json",
    url: "terceros_ul_save.php",
    dropZone: $("#hidden_field_data_archivo_pago" + iSeqRow),
    formData: function() {
      return [
        {name: 'param_field', value: 'archivo_pago'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_archivo_pago" + iSeqRow);
        loaderContent = $("#id_img_loader_archivo_pago" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_archivo_pago" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_pago(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_archivo_pago(data);
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
        $("#id_img_loader_archivo_pago" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_archivo_pago" + iSeqRow).hide();
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
      $("#id_sc_field_archivo_pago" + iSeqRow).val("");
      $("#id_sc_field_archivo_pago_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_archivo_pago_ul_type" + iSeqRow).val(fileData[0].type);
      $("#id_ajax_doc_archivo_pago" + iSeqRow).html(fileData[0].name);
      $("#id_ajax_doc_archivo_pago" + iSeqRow).css("display", "");
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_archivo_pago" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_archivo_pago" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_imagenter" + iSeqRow).fileupload({
    datatype: "json",
    url: "terceros_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'imagenter'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_imagenter" + iSeqRow);
        loaderContent = $("#id_img_loader_imagenter" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_imagenter" + iSeqRow);
        loader.show();
      }
    },
    change: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenter(data);
      if ('ok' != checkUploadSize) {
        e.preventDefault();
        scJs_alert(scFormatExtensionSizeErrorMsg(checkUploadSize), function() {}, {'type': 'error'});
      }
    },
    drop: function(e, data) {
      var checkUploadSize = scCheckUploadExtensionSize_imagenter(data);
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
        $("#id_img_loader_imagenter" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_imagenter" + iSeqRow).hide();
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
      $("#id_sc_field_imagenter" + iSeqRow).val("");
      $("#id_sc_field_imagenter_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_imagenter_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_imagenter = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_imagenter) ? "none" : "";
      $("#id_ajax_img_imagenter" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_imagenter" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_imagenter) {
        document.F1.temp_out_imagenter.value = var_ajax_img_thumb;
        document.F1.temp_out1_imagenter.value = var_ajax_img_imagenter;
      }
      else if (document.F1.temp_out_imagenter) {
        document.F1.temp_out_imagenter.value = var_ajax_img_imagenter;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_imagenter" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_imagenter" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_imagenter" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_imagenter" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'terceros')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "tipo" == specificField) {
    scJQSelect2Add_tipo(seqRow);
  }
  if (null == specificField || "regimen" == specificField) {
    scJQSelect2Add_regimen(seqRow);
  }
  if (null == specificField || "tipo_documento" == specificField) {
    scJQSelect2Add_tipo_documento(seqRow);
  }
  if (null == specificField || "sexo" == specificField) {
    scJQSelect2Add_sexo(seqRow);
  }
  if (null == specificField || "departamento" == specificField) {
    scJQSelect2Add_departamento(seqRow);
  }
  if (null == specificField || "idmuni" == specificField) {
    scJQSelect2Add_idmuni(seqRow);
  }
  if (null == specificField || "ciudad" == specificField) {
    scJQSelect2Add_ciudad(seqRow);
  }
  if (null == specificField || "codigo_postal" == specificField) {
    scJQSelect2Add_codigo_postal(seqRow);
  }
  if (null == specificField || "lenguaje" == specificField) {
    scJQSelect2Add_lenguaje(seqRow);
  }
  if (null == specificField || "credito" == specificField) {
    scJQSelect2Add_credito(seqRow);
  }
  if (null == specificField || "efec_retencion" == specificField) {
    scJQSelect2Add_efec_retencion(seqRow);
  }
  if (null == specificField || "listaprecios" == specificField) {
    scJQSelect2Add_listaprecios(seqRow);
  }
  if (null == specificField || "loatiende" == specificField) {
    scJQSelect2Add_loatiende(seqRow);
  }
  if (null == specificField || "autoretenedor" == specificField) {
    scJQSelect2Add_autoretenedor(seqRow);
  }
  if (null == specificField || "creditoprov" == specificField) {
    scJQSelect2Add_creditoprov(seqRow);
  }
  if (null == specificField || "zona_clientes" == specificField) {
    scJQSelect2Add_zona_clientes(seqRow);
  }
  if (null == specificField || "clasificacion_clientes" == specificField) {
    scJQSelect2Add_clasificacion_clientes(seqRow);
  }
  if (null == specificField || "id_plan" == specificField) {
    scJQSelect2Add_id_plan(seqRow);
  }
  if (null == specificField || "estado" == specificField) {
    scJQSelect2Add_estado(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_tipo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_obj" : "#id_sc_field_tipo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_obj',
      dropdownCssClass: 'css_tipo_obj',
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

function scJQSelect2Add_regimen(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_regimen_obj" : "#id_sc_field_regimen" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_regimen_obj',
      dropdownCssClass: 'css_regimen_obj',
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

function scJQSelect2Add_tipo_documento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tipo_documento_obj" : "#id_sc_field_tipo_documento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_tipo_documento_obj',
      dropdownCssClass: 'css_tipo_documento_obj',
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

function scJQSelect2Add_sexo(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_sexo_obj" : "#id_sc_field_sexo" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_sexo_obj',
      dropdownCssClass: 'css_sexo_obj',
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

function scJQSelect2Add_departamento(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_departamento_obj" : "#id_sc_field_departamento" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_departamento_obj',
      dropdownCssClass: 'css_departamento_obj',
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

function scJQSelect2Add_idmuni(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_idmuni_obj" : "#id_sc_field_idmuni" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_idmuni_obj',
      dropdownCssClass: 'css_idmuni_obj',
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

function scJQSelect2Add_ciudad(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_ciudad_obj" : "#id_sc_field_ciudad" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_ciudad_obj',
      dropdownCssClass: 'css_ciudad_obj',
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

function scJQSelect2Add_codigo_postal(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_codigo_postal_obj" : "#id_sc_field_codigo_postal" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_codigo_postal_obj',
      dropdownCssClass: 'css_codigo_postal_obj',
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

function scJQSelect2Add_lenguaje(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_lenguaje_obj" : "#id_sc_field_lenguaje" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_lenguaje_obj',
      dropdownCssClass: 'css_lenguaje_obj',
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

function scJQSelect2Add_credito(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_credito_obj" : "#id_sc_field_credito" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_credito_obj',
      dropdownCssClass: 'css_credito_obj',
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

function scJQSelect2Add_efec_retencion(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_efec_retencion_obj" : "#id_sc_field_efec_retencion" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_efec_retencion_obj',
      dropdownCssClass: 'css_efec_retencion_obj',
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

function scJQSelect2Add_listaprecios(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_listaprecios_obj" : "#id_sc_field_listaprecios" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_listaprecios_obj',
      dropdownCssClass: 'css_listaprecios_obj',
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

function scJQSelect2Add_loatiende(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_loatiende_obj" : "#id_sc_field_loatiende" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_loatiende_obj',
      dropdownCssClass: 'css_loatiende_obj',
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

function scJQSelect2Add_autoretenedor(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_autoretenedor_obj" : "#id_sc_field_autoretenedor" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_autoretenedor_obj',
      dropdownCssClass: 'css_autoretenedor_obj',
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

function scJQSelect2Add_creditoprov(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_creditoprov_obj" : "#id_sc_field_creditoprov" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_creditoprov_obj',
      dropdownCssClass: 'css_creditoprov_obj',
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

function scJQSelect2Add_zona_clientes(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_zona_clientes_obj" : "#id_sc_field_zona_clientes" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_zona_clientes_obj',
      dropdownCssClass: 'css_zona_clientes_obj',
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

function scJQSelect2Add_clasificacion_clientes(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_clasificacion_clientes_obj" : "#id_sc_field_clasificacion_clientes" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_clasificacion_clientes_obj',
      dropdownCssClass: 'css_clasificacion_clientes_obj',
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

function scJQSelect2Add_id_plan(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_id_plan_obj" : "#id_sc_field_id_plan" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_id_plan_obj',
      dropdownCssClass: 'css_id_plan_obj',
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

function scJQSelect2Add_estado(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_estado_obj" : "#id_sc_field_estado" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_estado_obj',
      dropdownCssClass: 'css_estado_obj',
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
  scJQLinkReadonlyAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo) { displayChange_field_tipo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_regimen) { displayChange_field_regimen(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tipo_documento) { displayChange_field_tipo_documento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_sexo) { displayChange_field_sexo(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_departamento) { displayChange_field_departamento(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_idmuni) { displayChange_field_idmuni(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_ciudad) { displayChange_field_ciudad(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_codigo_postal) { displayChange_field_codigo_postal(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_lenguaje) { displayChange_field_lenguaje(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_credito) { displayChange_field_credito(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_efec_retencion) { displayChange_field_efec_retencion(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_listaprecios) { displayChange_field_listaprecios(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_loatiende) { displayChange_field_loatiende(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_autoretenedor) { displayChange_field_autoretenedor(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_creditoprov) { displayChange_field_creditoprov(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_zona_clientes) { displayChange_field_zona_clientes(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_clasificacion_clientes) { displayChange_field_clasificacion_clientes(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_id_plan) { displayChange_field_id_plan(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_estado) { displayChange_field_estado(iLine, "on"); } }, 150);
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

function scCheckUploadExtensionSize_archivo_cedula(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (![".pdf"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

function scCheckUploadExtensionSize_archivo_rut(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (![".pdf"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

function scCheckUploadExtensionSize_archivo_nit(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (![".pdf"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

function scCheckUploadExtensionSize_archivo_pago(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (![".pdf", ".jpg", ".jpeg", ".png", ".bmp", ".gif"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
}

function scCheckUploadExtensionSize_imagenter(thisField)
{
    if ("files" in thisField && thisField.files.length > 0) {
        thisFileExtension = scGetFileExtension(thisField.files[0].name);


        if (!["jpg", "jpeg", "gif", "png"].includes(thisFileExtension)) {
            return 'err_extension||' + thisFileExtension.toUpperCase();
        }
    }

    return 'ok';
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
