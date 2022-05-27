<?php
//
class form_configuraciones_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = false;
   var $classes_100perc_fields = array();
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $idconfiguraciones;
   var $lineasporfactura;
   var $consolidararticulos;
   var $consolidararticulos_1;
   var $serial;
   var $fecha;
   var $ultima_edicion;
   var $ultima_edicion_hora;
   var $activo;
   var $espaciado;
   var $nombre_pc;
   var $nombre_impre;
   var $ruta_bd_tns;
   var $ip;
   var $refresh_grid_doc;
   var $modificainvpedido;
   var $modificainvpedido_1;
   var $caja_movil;
   var $caja_movil_1;
   var $integrar_tns;
   var $integrar_tns_1;
   var $essociedad;
   var $essociedad_1;
   var $grancontr;
   var $grancontr_1;
   var $apertura_caja;
   var $apertura_caja_1;
   var $control_diasmora;
   var $control_diasmora_1;
   var $control_costo;
   var $control_costo_1;
   var $activar_console_log;
   var $activar_console_log_1;
   var $pago_automatico;
   var $pago_automatico_1;
   var $tipodoc_pordefecto_pos;
   var $tipodoc_pordefecto_pos_1;
   var $nube_pedidos;
   var $nube_pedidos_1;
   var $nube_inventario;
   var $nube_inventario_1;
   var $nube_cartera;
   var $nube_cartera_1;
   var $nube_tesoreria;
   var $nube_tesoreria_1;
   var $nube_agenda;
   var $nube_agenda_1;
   var $nube_compras;
   var $nube_compras_1;
   var $nube_codigo;
   var $token;
   var $password;
   var $codproducto_en_facventa;
   var $codproducto_en_facventa_1;
   var $habilitar_comprobantes;
   var $habilitar_comprobantes_1;
   var $noborrar_tmp_enpos;
   var $noborrar_tmp_enpos_1;
   var $desactivar_control_sesion;
   var $desactivar_control_sesion_1;
   var $dia_limite_pago;
   var $licencia_activa;
   var $fecha_activacion;
   var $fecha_activacion_hora;
   var $cod_cliente;
   var $valor_propina_sugerida;
   var $validar_correo_enlinea;
   var $validar_correo_enlinea_1;
   var $ver_xml_fe;
   var $ver_xml_fe_1;
   var $columna_imprimir_ticket;
   var $columna_imprimir_ticket_1;
   var $columna_imprimir_a4;
   var $columna_imprimir_a4_1;
   var $columna_whatsapp;
   var $columna_whatsapp_1;
   var $columna_npedido;
   var $columna_npedido_1;
   var $columna_reg_pdf_propio;
   var $columna_reg_pdf_propio_1;
   var $ver_grupo;
   var $ver_grupo_1;
   var $ver_codigo;
   var $ver_codigo_1;
   var $ver_imagen;
   var $ver_imagen_1;
   var $ver_existencia;
   var $ver_existencia_1;
   var $ver_unidad;
   var $ver_unidad_1;
   var $ver_precio;
   var $ver_precio_1;
   var $ver_impuesto;
   var $ver_impuesto_1;
   var $ver_stock;
   var $ver_stock_1;
   var $ver_ubicacion;
   var $ver_ubicacion_1;
   var $ver_costo;
   var $ver_costo_1;
   var $ver_proveedor;
   var $ver_proveedor_1;
   var $ver_combo;
   var $ver_combo_1;
   var $ver_agregar_nota;
   var $ver_agregar_nota_1;
   var $ver_busqueda_refinada;
   var $ver_busqueda_refinada_1;
   var $cal_valores_decimales;
   var $cal_cantidades_decimales;
   var $validar_codbarras;
   var $validar_codbarras_1;
   var $minutos_inactividad;
   var $probarnube;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['activar_console_log']))
          {
              $this->activar_console_log = $this->NM_ajax_info['param']['activar_console_log'];
          }
          if (isset($this->NM_ajax_info['param']['activo']))
          {
              $this->activo = $this->NM_ajax_info['param']['activo'];
          }
          if (isset($this->NM_ajax_info['param']['apertura_caja']))
          {
              $this->apertura_caja = $this->NM_ajax_info['param']['apertura_caja'];
          }
          if (isset($this->NM_ajax_info['param']['caja_movil']))
          {
              $this->caja_movil = $this->NM_ajax_info['param']['caja_movil'];
          }
          if (isset($this->NM_ajax_info['param']['cal_cantidades_decimales']))
          {
              $this->cal_cantidades_decimales = $this->NM_ajax_info['param']['cal_cantidades_decimales'];
          }
          if (isset($this->NM_ajax_info['param']['cal_valores_decimales']))
          {
              $this->cal_valores_decimales = $this->NM_ajax_info['param']['cal_valores_decimales'];
          }
          if (isset($this->NM_ajax_info['param']['codproducto_en_facventa']))
          {
              $this->codproducto_en_facventa = $this->NM_ajax_info['param']['codproducto_en_facventa'];
          }
          if (isset($this->NM_ajax_info['param']['columna_imprimir_a4']))
          {
              $this->columna_imprimir_a4 = $this->NM_ajax_info['param']['columna_imprimir_a4'];
          }
          if (isset($this->NM_ajax_info['param']['columna_imprimir_ticket']))
          {
              $this->columna_imprimir_ticket = $this->NM_ajax_info['param']['columna_imprimir_ticket'];
          }
          if (isset($this->NM_ajax_info['param']['columna_npedido']))
          {
              $this->columna_npedido = $this->NM_ajax_info['param']['columna_npedido'];
          }
          if (isset($this->NM_ajax_info['param']['columna_reg_pdf_propio']))
          {
              $this->columna_reg_pdf_propio = $this->NM_ajax_info['param']['columna_reg_pdf_propio'];
          }
          if (isset($this->NM_ajax_info['param']['columna_whatsapp']))
          {
              $this->columna_whatsapp = $this->NM_ajax_info['param']['columna_whatsapp'];
          }
          if (isset($this->NM_ajax_info['param']['consolidararticulos']))
          {
              $this->consolidararticulos = $this->NM_ajax_info['param']['consolidararticulos'];
          }
          if (isset($this->NM_ajax_info['param']['control_costo']))
          {
              $this->control_costo = $this->NM_ajax_info['param']['control_costo'];
          }
          if (isset($this->NM_ajax_info['param']['control_diasmora']))
          {
              $this->control_diasmora = $this->NM_ajax_info['param']['control_diasmora'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['desactivar_control_sesion']))
          {
              $this->desactivar_control_sesion = $this->NM_ajax_info['param']['desactivar_control_sesion'];
          }
          if (isset($this->NM_ajax_info['param']['dia_limite_pago']))
          {
              $this->dia_limite_pago = $this->NM_ajax_info['param']['dia_limite_pago'];
          }
          if (isset($this->NM_ajax_info['param']['espaciado']))
          {
              $this->espaciado = $this->NM_ajax_info['param']['espaciado'];
          }
          if (isset($this->NM_ajax_info['param']['essociedad']))
          {
              $this->essociedad = $this->NM_ajax_info['param']['essociedad'];
          }
          if (isset($this->NM_ajax_info['param']['fecha']))
          {
              $this->fecha = $this->NM_ajax_info['param']['fecha'];
          }
          if (isset($this->NM_ajax_info['param']['grancontr']))
          {
              $this->grancontr = $this->NM_ajax_info['param']['grancontr'];
          }
          if (isset($this->NM_ajax_info['param']['idconfiguraciones']))
          {
              $this->idconfiguraciones = $this->NM_ajax_info['param']['idconfiguraciones'];
          }
          if (isset($this->NM_ajax_info['param']['lineasporfactura']))
          {
              $this->lineasporfactura = $this->NM_ajax_info['param']['lineasporfactura'];
          }
          if (isset($this->NM_ajax_info['param']['minutos_inactividad']))
          {
              $this->minutos_inactividad = $this->NM_ajax_info['param']['minutos_inactividad'];
          }
          if (isset($this->NM_ajax_info['param']['modificainvpedido']))
          {
              $this->modificainvpedido = $this->NM_ajax_info['param']['modificainvpedido'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['noborrar_tmp_enpos']))
          {
              $this->noborrar_tmp_enpos = $this->NM_ajax_info['param']['noborrar_tmp_enpos'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_impre']))
          {
              $this->nombre_impre = $this->NM_ajax_info['param']['nombre_impre'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_pc']))
          {
              $this->nombre_pc = $this->NM_ajax_info['param']['nombre_pc'];
          }
          if (isset($this->NM_ajax_info['param']['pago_automatico']))
          {
              $this->pago_automatico = $this->NM_ajax_info['param']['pago_automatico'];
          }
          if (isset($this->NM_ajax_info['param']['refresh_grid_doc']))
          {
              $this->refresh_grid_doc = $this->NM_ajax_info['param']['refresh_grid_doc'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['serial']))
          {
              $this->serial = $this->NM_ajax_info['param']['serial'];
          }
          if (isset($this->NM_ajax_info['param']['tipodoc_pordefecto_pos']))
          {
              $this->tipodoc_pordefecto_pos = $this->NM_ajax_info['param']['tipodoc_pordefecto_pos'];
          }
          if (isset($this->NM_ajax_info['param']['validar_codbarras']))
          {
              $this->validar_codbarras = $this->NM_ajax_info['param']['validar_codbarras'];
          }
          if (isset($this->NM_ajax_info['param']['validar_correo_enlinea']))
          {
              $this->validar_correo_enlinea = $this->NM_ajax_info['param']['validar_correo_enlinea'];
          }
          if (isset($this->NM_ajax_info['param']['valor_propina_sugerida']))
          {
              $this->valor_propina_sugerida = $this->NM_ajax_info['param']['valor_propina_sugerida'];
          }
          if (isset($this->NM_ajax_info['param']['ver_agregar_nota']))
          {
              $this->ver_agregar_nota = $this->NM_ajax_info['param']['ver_agregar_nota'];
          }
          if (isset($this->NM_ajax_info['param']['ver_busqueda_refinada']))
          {
              $this->ver_busqueda_refinada = $this->NM_ajax_info['param']['ver_busqueda_refinada'];
          }
          if (isset($this->NM_ajax_info['param']['ver_codigo']))
          {
              $this->ver_codigo = $this->NM_ajax_info['param']['ver_codigo'];
          }
          if (isset($this->NM_ajax_info['param']['ver_combo']))
          {
              $this->ver_combo = $this->NM_ajax_info['param']['ver_combo'];
          }
          if (isset($this->NM_ajax_info['param']['ver_costo']))
          {
              $this->ver_costo = $this->NM_ajax_info['param']['ver_costo'];
          }
          if (isset($this->NM_ajax_info['param']['ver_existencia']))
          {
              $this->ver_existencia = $this->NM_ajax_info['param']['ver_existencia'];
          }
          if (isset($this->NM_ajax_info['param']['ver_grupo']))
          {
              $this->ver_grupo = $this->NM_ajax_info['param']['ver_grupo'];
          }
          if (isset($this->NM_ajax_info['param']['ver_imagen']))
          {
              $this->ver_imagen = $this->NM_ajax_info['param']['ver_imagen'];
          }
          if (isset($this->NM_ajax_info['param']['ver_impuesto']))
          {
              $this->ver_impuesto = $this->NM_ajax_info['param']['ver_impuesto'];
          }
          if (isset($this->NM_ajax_info['param']['ver_precio']))
          {
              $this->ver_precio = $this->NM_ajax_info['param']['ver_precio'];
          }
          if (isset($this->NM_ajax_info['param']['ver_proveedor']))
          {
              $this->ver_proveedor = $this->NM_ajax_info['param']['ver_proveedor'];
          }
          if (isset($this->NM_ajax_info['param']['ver_stock']))
          {
              $this->ver_stock = $this->NM_ajax_info['param']['ver_stock'];
          }
          if (isset($this->NM_ajax_info['param']['ver_ubicacion']))
          {
              $this->ver_ubicacion = $this->NM_ajax_info['param']['ver_ubicacion'];
          }
          if (isset($this->NM_ajax_info['param']['ver_unidad']))
          {
              $this->ver_unidad = $this->NM_ajax_info['param']['ver_unidad'];
          }
          if (isset($this->NM_ajax_info['param']['ver_xml_fe']))
          {
              $this->ver_xml_fe = $this->NM_ajax_info['param']['ver_xml_fe'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->gconsolidararticulos) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
      }
      if (isset($this->gespaciadodetallefactura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
      }
      if (isset($this->gTiempoSegRefreshDoc) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
      }
      if (isset($this->gimpresorapos) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gimpresorapos'] = $this->gimpresorapos;
      }
      if (isset($this->glineasporfactura) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['glineasporfactura'] = $this->glineasporfactura;
      }
      if (isset($this->gapertura_caja) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gapertura_caja'] = $this->gapertura_caja;
      }
      if (isset($this->gidtercero) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_POST["gconsolidararticulos"]) && isset($this->gconsolidararticulos)) 
      {
          $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
      }
      if (isset($_POST["gespaciadodetallefactura"]) && isset($this->gespaciadodetallefactura)) 
      {
          $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
      }
      if (isset($_POST["gTiempoSegRefreshDoc"]) && isset($this->gTiempoSegRefreshDoc)) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
      }
      if (!isset($_POST["gTiempoSegRefreshDoc"]) && isset($_POST["gtiemposegrefreshdoc"])) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $_POST["gtiemposegrefreshdoc"];
      }
      if (isset($_POST["gimpresorapos"]) && isset($this->gimpresorapos)) 
      {
          $_SESSION['gimpresorapos'] = $this->gimpresorapos;
      }
      if (isset($_POST["glineasporfactura"]) && isset($this->glineasporfactura)) 
      {
          $_SESSION['glineasporfactura'] = $this->glineasporfactura;
      }
      if (isset($_POST["gapertura_caja"]) && isset($this->gapertura_caja)) 
      {
          $_SESSION['gapertura_caja'] = $this->gapertura_caja;
      }
      if (isset($_POST["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($_GET["gconsolidararticulos"]) && isset($this->gconsolidararticulos)) 
      {
          $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
      }
      if (isset($_GET["gespaciadodetallefactura"]) && isset($this->gespaciadodetallefactura)) 
      {
          $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
      }
      if (isset($_GET["gTiempoSegRefreshDoc"]) && isset($this->gTiempoSegRefreshDoc)) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
      }
      if (!isset($_GET["gTiempoSegRefreshDoc"]) && isset($_GET["gtiemposegrefreshdoc"])) 
      {
          $_SESSION['gTiempoSegRefreshDoc'] = $_GET["gtiemposegrefreshdoc"];
      }
      if (isset($_GET["gimpresorapos"]) && isset($this->gimpresorapos)) 
      {
          $_SESSION['gimpresorapos'] = $this->gimpresorapos;
      }
      if (isset($_GET["glineasporfactura"]) && isset($this->glineasporfactura)) 
      {
          $_SESSION['glineasporfactura'] = $this->glineasporfactura;
      }
      if (isset($_GET["gapertura_caja"]) && isset($this->gapertura_caja)) 
      {
          $_SESSION['gapertura_caja'] = $this->gapertura_caja;
      }
      if (isset($_GET["gidtercero"]) && isset($this->gidtercero)) 
      {
          $_SESSION['gidtercero'] = $this->gidtercero;
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_configuraciones']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_configuraciones']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_configuraciones($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->gconsolidararticulos)) 
          {
              $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
          }
          if (isset($this->gespaciadodetallefactura)) 
          {
              $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
          }
          if (!isset($this->gTiempoSegRefreshDoc) && isset($this->gtiemposegrefreshdoc)) 
          {
              $this->gTiempoSegRefreshDoc = $this->gtiemposegrefreshdoc;
          }
          if (isset($this->gTiempoSegRefreshDoc)) 
          {
              $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
          }
          if (isset($this->gimpresorapos)) 
          {
              $_SESSION['gimpresorapos'] = $this->gimpresorapos;
          }
          if (isset($this->glineasporfactura)) 
          {
              $_SESSION['glineasporfactura'] = $this->glineasporfactura;
          }
          if (isset($this->gapertura_caja)) 
          {
              $_SESSION['gapertura_caja'] = $this->gapertura_caja;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_configuraciones']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->gconsolidararticulos)) 
          {
              $_SESSION['gconsolidararticulos'] = $this->gconsolidararticulos;
          }
          if (isset($this->gespaciadodetallefactura)) 
          {
              $_SESSION['gespaciadodetallefactura'] = $this->gespaciadodetallefactura;
          }
          if (!isset($this->gTiempoSegRefreshDoc) && isset($this->gtiemposegrefreshdoc)) 
          {
              $this->gTiempoSegRefreshDoc = $this->gtiemposegrefreshdoc;
          }
          if (isset($this->gTiempoSegRefreshDoc)) 
          {
              $_SESSION['gTiempoSegRefreshDoc'] = $this->gTiempoSegRefreshDoc;
          }
          if (isset($this->gimpresorapos)) 
          {
              $_SESSION['gimpresorapos'] = $this->gimpresorapos;
          }
          if (isset($this->glineasporfactura)) 
          {
              $_SESSION['glineasporfactura'] = $this->glineasporfactura;
          }
          if (isset($this->gapertura_caja)) 
          {
              $_SESSION['gapertura_caja'] = $this->gapertura_caja;
          }
          if (isset($this->gidtercero)) 
          {
              $_SESSION['gidtercero'] = $this->gidtercero;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_configuraciones']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_configuraciones']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_configuraciones_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['initialize'];
          $this->Db = $this->Ini->Db; 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['initialize']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['initialize'])
          {
              $_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
  ?>
<link rel="stylesheet" type="text/css" href="<?php echo sc_url_library('prj', 'js', 'jquery-ui.css'); ?>">
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-1.11.1.js'); ?>"></script>
<script src="<?php echo sc_url_library('prj', 'js', 'jquery-ui.js'); ?>"></script>

<div id="dialog" title="Autorizar">
	<center>
	<input id="dusuario" type="text" size="25" style="text-align:center;" autocomplete="false" placeholder="Usuario" required />
	<br>
    <input id="dpassword" type="password" size="25" style="text-align:center;" autocomplete="false" placeholder="Contraseña"/>
	<br><br>
	<button id="idautorizar">Autorizar</button>
	</center>
</div>
<?php
$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off';
          }
          $this->Ini->init2();
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_configuraciones']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_configuraciones']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_configuraciones'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_configuraciones']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_configuraciones']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_configuraciones') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_configuraciones']['label'] = "Configuraciones";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_configuraciones")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_BlueBerry";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;


      $this->arr_buttons['activar']['hint']             = "";
      $this->arr_buttons['activar']['type']             = "button";
      $this->arr_buttons['activar']['value']            = "activar";
      $this->arr_buttons['activar']['display']          = "only_text";
      $this->arr_buttons['activar']['display_position'] = "text_right";
      $this->arr_buttons['activar']['style']            = "default";
      $this->arr_buttons['activar']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_configuraciones']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_configuraciones'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      $this->nmgp_botoes['activar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_orig'] = " where idconfiguraciones='1'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_pesq'] = " where idconfiguraciones='1'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_configuraciones']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_configuraciones'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_configuraciones'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_form'];
          if (!isset($this->ultima_edicion)){$this->ultima_edicion = $this->nmgp_dados_form['ultima_edicion'];} 
          if (!isset($this->ruta_bd_tns)){$this->ruta_bd_tns = $this->nmgp_dados_form['ruta_bd_tns'];} 
          if (!isset($this->ip)){$this->ip = $this->nmgp_dados_form['ip'];} 
          if (!isset($this->integrar_tns)){$this->integrar_tns = $this->nmgp_dados_form['integrar_tns'];} 
          if (!isset($this->nube_pedidos)){$this->nube_pedidos = $this->nmgp_dados_form['nube_pedidos'];} 
          if (!isset($this->nube_inventario)){$this->nube_inventario = $this->nmgp_dados_form['nube_inventario'];} 
          if (!isset($this->nube_cartera)){$this->nube_cartera = $this->nmgp_dados_form['nube_cartera'];} 
          if (!isset($this->nube_tesoreria)){$this->nube_tesoreria = $this->nmgp_dados_form['nube_tesoreria'];} 
          if (!isset($this->nube_agenda)){$this->nube_agenda = $this->nmgp_dados_form['nube_agenda'];} 
          if (!isset($this->nube_compras)){$this->nube_compras = $this->nmgp_dados_form['nube_compras'];} 
          if (!isset($this->nube_codigo)){$this->nube_codigo = $this->nmgp_dados_form['nube_codigo'];} 
          if (!isset($this->token)){$this->token = $this->nmgp_dados_form['token'];} 
          if (!isset($this->password)){$this->password = $this->nmgp_dados_form['password'];} 
          if (!isset($this->habilitar_comprobantes)){$this->habilitar_comprobantes = $this->nmgp_dados_form['habilitar_comprobantes'];} 
          if (!isset($this->licencia_activa)){$this->licencia_activa = $this->nmgp_dados_form['licencia_activa'];} 
          if (!isset($this->fecha_activacion)){$this->fecha_activacion = $this->nmgp_dados_form['fecha_activacion'];} 
          if (!isset($this->cod_cliente)){$this->cod_cliente = $this->nmgp_dados_form['cod_cliente'];} 
          if (!isset($this->probarnube)){$this->probarnube = $this->nmgp_dados_form['probarnube'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_configuraciones", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      if ($this->Embutida_proc)
      { 
          include_once($this->Ini->path_embutida . 'form_configuraciones/conexionExternaBD.php');
      }
      else
      { 
          include_once($this->Ini->path_aplicacao . 'conexionExternaBD.php');
      }
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'form_configuraciones_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_configuraciones_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_configuraciones/form_configuraciones_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_configuraciones_erro.class.php"); 
      }
      $this->Erro      = new form_configuraciones_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao']))
         { 
             if ($this->idconfiguraciones != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_configuraciones']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['activar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['activar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['botoes']['activar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
  ?>
<script>
$(document).ready(function(){

	$("#dialog").hide();
	
		function fValidarUsuario(usuario,clave){
			
			var usuarioadmin  = "fweb";
			var passwordadmin = "..ffxx2020";

			if(clave == passwordadmin && usuario == usuarioadmin){
				
				$.post("../blank_obtener_serial/index.php",{
					ok:""
				},function(r){
					
					$("#id_sc_field_serial").val(r);

					$("#dusuario").val("");
					$("#dpassword").val("");

					$("#dialog").hide();
					$( "#dialog").dialog("close");
				});

			}else{

				alert("Credenciales inválidas");
			}
		}
	
		$("#idautorizar").click(function(e){
			
			e.preventDefault();
			
			var  usuario = $("#dusuario").val();
			var  clave   = $("#dpassword").val();
	
			if(!$.isEmptyObject(clave) && !$.isEmptyObject(usuario)){

				fValidarUsuario(usuario,clave);
	
			}else{
	
				alert("Digite usuario y clave");
			}
		});
	
		$("#dpassword").keypress(function(e){

			var code = (e.keyCode ? e.keyCode : e.which);

			if(code == 13) {
	
				var  usuario = $("#dusuario").val();
				var  clave   = $("#dpassword").val();
	
				if(!$.isEmptyObject(clave) && !$.isEmptyObject(usuario)){

					fValidarUsuario(usuario,clave);
	
				}else{
	
					alert("Digite usuario y clave");
	
				}
	
			 	return false;
			}

		});
});
</script>
<?php

$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off'; 
      }
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_configuraciones']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_configuraciones']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';

            if(file_exists($out1_img_cache)){
                echo $out1_img_cache;
                exit;
            }
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->idconfiguraciones)) { $this->nm_limpa_alfa($this->idconfiguraciones); }
      if (isset($this->lineasporfactura)) { $this->nm_limpa_alfa($this->lineasporfactura); }
      if (isset($this->serial)) { $this->nm_limpa_alfa($this->serial); }
      if (isset($this->espaciado)) { $this->nm_limpa_alfa($this->espaciado); }
      if (isset($this->nombre_pc)) { $this->nm_limpa_alfa($this->nombre_pc); }
      if (isset($this->nombre_impre)) { $this->nm_limpa_alfa($this->nombre_impre); }
      if (isset($this->refresh_grid_doc)) { $this->nm_limpa_alfa($this->refresh_grid_doc); }
      if (isset($this->dia_limite_pago)) { $this->nm_limpa_alfa($this->dia_limite_pago); }
      if (isset($this->valor_propina_sugerida)) { $this->nm_limpa_alfa($this->valor_propina_sugerida); }
      if (isset($this->cal_valores_decimales)) { $this->nm_limpa_alfa($this->cal_valores_decimales); }
      if (isset($this->cal_cantidades_decimales)) { $this->nm_limpa_alfa($this->cal_cantidades_decimales); }
      if (isset($this->minutos_inactividad)) { $this->nm_limpa_alfa($this->minutos_inactividad); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- lineasporfactura
      $this->field_config['lineasporfactura']               = array();
      $this->field_config['lineasporfactura']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['lineasporfactura']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['lineasporfactura']['symbol_dec'] = '';
      $this->field_config['lineasporfactura']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['lineasporfactura']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fecha
      $this->field_config['fecha']                 = array();
      $this->field_config['fecha']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fecha']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fecha');
      //-- espaciado
      $this->field_config['espaciado']               = array();
      $this->field_config['espaciado']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['espaciado']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['espaciado']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['espaciado']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['espaciado']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- minutos_inactividad
      $this->field_config['minutos_inactividad']               = array();
      $this->field_config['minutos_inactividad']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['minutos_inactividad']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['minutos_inactividad']['symbol_dec'] = '';
      $this->field_config['minutos_inactividad']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['minutos_inactividad']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dia_limite_pago
      $this->field_config['dia_limite_pago']               = array();
      $this->field_config['dia_limite_pago']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dia_limite_pago']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dia_limite_pago']['symbol_dec'] = '';
      $this->field_config['dia_limite_pago']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dia_limite_pago']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- refresh_grid_doc
      $this->field_config['refresh_grid_doc']               = array();
      $this->field_config['refresh_grid_doc']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['refresh_grid_doc']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['refresh_grid_doc']['symbol_dec'] = '';
      $this->field_config['refresh_grid_doc']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['refresh_grid_doc']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- idconfiguraciones
      $this->field_config['idconfiguraciones']               = array();
      $this->field_config['idconfiguraciones']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idconfiguraciones']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idconfiguraciones']['symbol_dec'] = '';
      $this->field_config['idconfiguraciones']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idconfiguraciones']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- valor_propina_sugerida
      $this->field_config['valor_propina_sugerida']               = array();
      $this->field_config['valor_propina_sugerida']['symbol_grp'] = ',';
      $this->field_config['valor_propina_sugerida']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valor_propina_sugerida']['symbol_dec'] = '.';
      $this->field_config['valor_propina_sugerida']['symbol_mon'] = '%';
      $this->field_config['valor_propina_sugerida']['format_pos'] = '3';
      $this->field_config['valor_propina_sugerida']['format_neg'] = '2';
      //-- cal_valores_decimales
      $this->field_config['cal_valores_decimales']               = array();
      $this->field_config['cal_valores_decimales']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cal_valores_decimales']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cal_valores_decimales']['symbol_dec'] = '';
      $this->field_config['cal_valores_decimales']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cal_valores_decimales']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cal_cantidades_decimales
      $this->field_config['cal_cantidades_decimales']               = array();
      $this->field_config['cal_cantidades_decimales']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cal_cantidades_decimales']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cal_cantidades_decimales']['symbol_dec'] = '';
      $this->field_config['cal_cantidades_decimales']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cal_cantidades_decimales']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- ultima_edicion
      $this->field_config['ultima_edicion']                 = array();
      $this->field_config['ultima_edicion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['ultima_edicion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['ultima_edicion']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['ultima_edicion']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'ultima_edicion');
      //-- fecha_activacion
      $this->field_config['fecha_activacion']                 = array();
      $this->field_config['fecha_activacion']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['fecha_activacion']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fecha_activacion']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['fecha_activacion']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'fecha_activacion');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_lineasporfactura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lineasporfactura');
          }
          if ('validate_consolidararticulos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'consolidararticulos');
          }
          if ('validate_serial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'serial');
          }
          if ('validate_fecha' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fecha');
          }
          if ('validate_activo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'activo');
          }
          if ('validate_espaciado' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'espaciado');
          }
          if ('validate_minutos_inactividad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'minutos_inactividad');
          }
          if ('validate_caja_movil' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'caja_movil');
          }
          if ('validate_pago_automatico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pago_automatico');
          }
          if ('validate_dia_limite_pago' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'dia_limite_pago');
          }
          if ('validate_refresh_grid_doc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'refresh_grid_doc');
          }
          if ('validate_desactivar_control_sesion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'desactivar_control_sesion');
          }
          if ('validate_nombre_pc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_pc');
          }
          if ('validate_nombre_impre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_impre');
          }
          if ('validate_essociedad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'essociedad');
          }
          if ('validate_grancontr' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'grancontr');
          }
          if ('validate_idconfiguraciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idconfiguraciones');
          }
          if ('validate_control_diasmora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'control_diasmora');
          }
          if ('validate_control_costo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'control_costo');
          }
          if ('validate_modificainvpedido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'modificainvpedido');
          }
          if ('validate_tipodoc_pordefecto_pos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipodoc_pordefecto_pos');
          }
          if ('validate_ver_xml_fe' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_xml_fe');
          }
          if ('validate_noborrar_tmp_enpos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'noborrar_tmp_enpos');
          }
          if ('validate_validar_correo_enlinea' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'validar_correo_enlinea');
          }
          if ('validate_apertura_caja' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apertura_caja');
          }
          if ('validate_activar_console_log' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'activar_console_log');
          }
          if ('validate_codproducto_en_facventa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codproducto_en_facventa');
          }
          if ('validate_valor_propina_sugerida' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valor_propina_sugerida');
          }
          if ('validate_columna_imprimir_ticket' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'columna_imprimir_ticket');
          }
          if ('validate_columna_imprimir_a4' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'columna_imprimir_a4');
          }
          if ('validate_columna_whatsapp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'columna_whatsapp');
          }
          if ('validate_columna_npedido' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'columna_npedido');
          }
          if ('validate_columna_reg_pdf_propio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'columna_reg_pdf_propio');
          }
          if ('validate_ver_busqueda_refinada' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_busqueda_refinada');
          }
          if ('validate_cal_valores_decimales' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cal_valores_decimales');
          }
          if ('validate_cal_cantidades_decimales' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cal_cantidades_decimales');
          }
          if ('validate_validar_codbarras' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'validar_codbarras');
          }
          if ('validate_ver_grupo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_grupo');
          }
          if ('validate_ver_codigo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_codigo');
          }
          if ('validate_ver_imagen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_imagen');
          }
          if ('validate_ver_existencia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_existencia');
          }
          if ('validate_ver_unidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_unidad');
          }
          if ('validate_ver_precio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_precio');
          }
          if ('validate_ver_impuesto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_impuesto');
          }
          if ('validate_ver_stock' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_stock');
          }
          if ('validate_ver_ubicacion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_ubicacion');
          }
          if ('validate_ver_costo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_costo');
          }
          if ('validate_ver_proveedor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_proveedor');
          }
          if ('validate_ver_combo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_combo');
          }
          if ('validate_ver_agregar_nota' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ver_agregar_nota');
          }
          form_configuraciones_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_apertura_caja_onclick' == $this->NM_ajax_opcao)
          {
              $this->apertura_caja_onClick();
          }
          if ('event_serial_onclick' == $this->NM_ajax_opcao)
          {
              $this->serial_onClick();
          }
          if ('event_serial_onfocus' == $this->NM_ajax_opcao)
          {
              $this->serial_onFocus();
          }
          form_configuraciones_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->modificainvpedido))
          {
              $x = 0; 
              $this->modificainvpedido_1 = $this->modificainvpedido;
              $this->modificainvpedido = ""; 
              if ($this->modificainvpedido_1 != "") 
              { 
                  foreach ($this->modificainvpedido_1 as $dados_modificainvpedido_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->modificainvpedido .= ";";
                      } 
                      $this->modificainvpedido .= $dados_modificainvpedido_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->caja_movil))
          {
              $x = 0; 
              $this->caja_movil_1 = $this->caja_movil;
              $this->caja_movil = ""; 
              if ($this->caja_movil_1 != "") 
              { 
                  foreach ($this->caja_movil_1 as $dados_caja_movil_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->caja_movil .= ";";
                      } 
                      $this->caja_movil .= $dados_caja_movil_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->integrar_tns))
          {
              $x = 0; 
              $this->integrar_tns_1 = $this->integrar_tns;
              $this->integrar_tns = ""; 
              if ($this->integrar_tns_1 != "") 
              { 
                  foreach ($this->integrar_tns_1 as $dados_integrar_tns_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->integrar_tns .= ";";
                      } 
                      $this->integrar_tns .= $dados_integrar_tns_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->essociedad))
          {
              $x = 0; 
              $this->essociedad_1 = $this->essociedad;
              $this->essociedad = ""; 
              if ($this->essociedad_1 != "") 
              { 
                  foreach ($this->essociedad_1 as $dados_essociedad_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->essociedad .= ";";
                      } 
                      $this->essociedad .= $dados_essociedad_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->grancontr))
          {
              $x = 0; 
              $this->grancontr_1 = $this->grancontr;
              $this->grancontr = ""; 
              if ($this->grancontr_1 != "") 
              { 
                  foreach ($this->grancontr_1 as $dados_grancontr_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->grancontr .= ";";
                      } 
                      $this->grancontr .= $dados_grancontr_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->apertura_caja))
          {
              $x = 0; 
              $this->apertura_caja_1 = $this->apertura_caja;
              $this->apertura_caja = ""; 
              if ($this->apertura_caja_1 != "") 
              { 
                  foreach ($this->apertura_caja_1 as $dados_apertura_caja_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->apertura_caja .= ";";
                      } 
                      $this->apertura_caja .= $dados_apertura_caja_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->control_diasmora))
          {
              $x = 0; 
              $this->control_diasmora_1 = $this->control_diasmora;
              $this->control_diasmora = ""; 
              if ($this->control_diasmora_1 != "") 
              { 
                  foreach ($this->control_diasmora_1 as $dados_control_diasmora_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->control_diasmora .= ";";
                      } 
                      $this->control_diasmora .= $dados_control_diasmora_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->control_costo))
          {
              $x = 0; 
              $this->control_costo_1 = $this->control_costo;
              $this->control_costo = ""; 
              if ($this->control_costo_1 != "") 
              { 
                  foreach ($this->control_costo_1 as $dados_control_costo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->control_costo .= ";";
                      } 
                      $this->control_costo .= $dados_control_costo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->activar_console_log))
          {
              $x = 0; 
              $this->activar_console_log_1 = $this->activar_console_log;
              $this->activar_console_log = ""; 
              if ($this->activar_console_log_1 != "") 
              { 
                  foreach ($this->activar_console_log_1 as $dados_activar_console_log_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->activar_console_log .= ";";
                      } 
                      $this->activar_console_log .= $dados_activar_console_log_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->pago_automatico))
          {
              $x = 0; 
              $this->pago_automatico_1 = $this->pago_automatico;
              $this->pago_automatico = ""; 
              if ($this->pago_automatico_1 != "") 
              { 
                  foreach ($this->pago_automatico_1 as $dados_pago_automatico_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->pago_automatico .= ";";
                      } 
                      $this->pago_automatico .= $dados_pago_automatico_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->nube_pedidos))
          {
              $x = 0; 
              $this->nube_pedidos_1 = $this->nube_pedidos;
              $this->nube_pedidos = ""; 
              if ($this->nube_pedidos_1 != "") 
              { 
                  foreach ($this->nube_pedidos_1 as $dados_nube_pedidos_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->nube_pedidos .= ";";
                      } 
                      $this->nube_pedidos .= $dados_nube_pedidos_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->nube_inventario))
          {
              $x = 0; 
              $this->nube_inventario_1 = $this->nube_inventario;
              $this->nube_inventario = ""; 
              if ($this->nube_inventario_1 != "") 
              { 
                  foreach ($this->nube_inventario_1 as $dados_nube_inventario_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->nube_inventario .= ";";
                      } 
                      $this->nube_inventario .= $dados_nube_inventario_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->nube_cartera))
          {
              $x = 0; 
              $this->nube_cartera_1 = $this->nube_cartera;
              $this->nube_cartera = ""; 
              if ($this->nube_cartera_1 != "") 
              { 
                  foreach ($this->nube_cartera_1 as $dados_nube_cartera_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->nube_cartera .= ";";
                      } 
                      $this->nube_cartera .= $dados_nube_cartera_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->nube_tesoreria))
          {
              $x = 0; 
              $this->nube_tesoreria_1 = $this->nube_tesoreria;
              $this->nube_tesoreria = ""; 
              if ($this->nube_tesoreria_1 != "") 
              { 
                  foreach ($this->nube_tesoreria_1 as $dados_nube_tesoreria_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->nube_tesoreria .= ";";
                      } 
                      $this->nube_tesoreria .= $dados_nube_tesoreria_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->nube_agenda))
          {
              $x = 0; 
              $this->nube_agenda_1 = $this->nube_agenda;
              $this->nube_agenda = ""; 
              if ($this->nube_agenda_1 != "") 
              { 
                  foreach ($this->nube_agenda_1 as $dados_nube_agenda_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->nube_agenda .= ";";
                      } 
                      $this->nube_agenda .= $dados_nube_agenda_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->nube_compras))
          {
              $x = 0; 
              $this->nube_compras_1 = $this->nube_compras;
              $this->nube_compras = ""; 
              if ($this->nube_compras_1 != "") 
              { 
                  foreach ($this->nube_compras_1 as $dados_nube_compras_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->nube_compras .= ";";
                      } 
                      $this->nube_compras .= $dados_nube_compras_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->codproducto_en_facventa))
          {
              $x = 0; 
              $this->codproducto_en_facventa_1 = $this->codproducto_en_facventa;
              $this->codproducto_en_facventa = ""; 
              if ($this->codproducto_en_facventa_1 != "") 
              { 
                  foreach ($this->codproducto_en_facventa_1 as $dados_codproducto_en_facventa_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->codproducto_en_facventa .= ";";
                      } 
                      $this->codproducto_en_facventa .= $dados_codproducto_en_facventa_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->habilitar_comprobantes))
          {
              $x = 0; 
              $this->habilitar_comprobantes_1 = $this->habilitar_comprobantes;
              $this->habilitar_comprobantes = ""; 
              if ($this->habilitar_comprobantes_1 != "") 
              { 
                  foreach ($this->habilitar_comprobantes_1 as $dados_habilitar_comprobantes_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->habilitar_comprobantes .= ";";
                      } 
                      $this->habilitar_comprobantes .= $dados_habilitar_comprobantes_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->noborrar_tmp_enpos))
          {
              $x = 0; 
              $this->noborrar_tmp_enpos_1 = $this->noborrar_tmp_enpos;
              $this->noborrar_tmp_enpos = ""; 
              if ($this->noborrar_tmp_enpos_1 != "") 
              { 
                  foreach ($this->noborrar_tmp_enpos_1 as $dados_noborrar_tmp_enpos_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->noborrar_tmp_enpos .= ";";
                      } 
                      $this->noborrar_tmp_enpos .= $dados_noborrar_tmp_enpos_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->desactivar_control_sesion))
          {
              $x = 0; 
              $this->desactivar_control_sesion_1 = $this->desactivar_control_sesion;
              $this->desactivar_control_sesion = ""; 
              if ($this->desactivar_control_sesion_1 != "") 
              { 
                  foreach ($this->desactivar_control_sesion_1 as $dados_desactivar_control_sesion_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->desactivar_control_sesion .= ";";
                      } 
                      $this->desactivar_control_sesion .= $dados_desactivar_control_sesion_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->validar_correo_enlinea))
          {
              $x = 0; 
              $this->validar_correo_enlinea_1 = $this->validar_correo_enlinea;
              $this->validar_correo_enlinea = ""; 
              if ($this->validar_correo_enlinea_1 != "") 
              { 
                  foreach ($this->validar_correo_enlinea_1 as $dados_validar_correo_enlinea_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->validar_correo_enlinea .= ";";
                      } 
                      $this->validar_correo_enlinea .= $dados_validar_correo_enlinea_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_xml_fe))
          {
              $x = 0; 
              $this->ver_xml_fe_1 = $this->ver_xml_fe;
              $this->ver_xml_fe = ""; 
              if ($this->ver_xml_fe_1 != "") 
              { 
                  foreach ($this->ver_xml_fe_1 as $dados_ver_xml_fe_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_xml_fe .= ";";
                      } 
                      $this->ver_xml_fe .= $dados_ver_xml_fe_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->columna_imprimir_ticket))
          {
              $x = 0; 
              $this->columna_imprimir_ticket_1 = $this->columna_imprimir_ticket;
              $this->columna_imprimir_ticket = ""; 
              if ($this->columna_imprimir_ticket_1 != "") 
              { 
                  foreach ($this->columna_imprimir_ticket_1 as $dados_columna_imprimir_ticket_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->columna_imprimir_ticket .= ";";
                      } 
                      $this->columna_imprimir_ticket .= $dados_columna_imprimir_ticket_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->columna_imprimir_a4))
          {
              $x = 0; 
              $this->columna_imprimir_a4_1 = $this->columna_imprimir_a4;
              $this->columna_imprimir_a4 = ""; 
              if ($this->columna_imprimir_a4_1 != "") 
              { 
                  foreach ($this->columna_imprimir_a4_1 as $dados_columna_imprimir_a4_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->columna_imprimir_a4 .= ";";
                      } 
                      $this->columna_imprimir_a4 .= $dados_columna_imprimir_a4_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->columna_whatsapp))
          {
              $x = 0; 
              $this->columna_whatsapp_1 = $this->columna_whatsapp;
              $this->columna_whatsapp = ""; 
              if ($this->columna_whatsapp_1 != "") 
              { 
                  foreach ($this->columna_whatsapp_1 as $dados_columna_whatsapp_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->columna_whatsapp .= ";";
                      } 
                      $this->columna_whatsapp .= $dados_columna_whatsapp_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->columna_npedido))
          {
              $x = 0; 
              $this->columna_npedido_1 = $this->columna_npedido;
              $this->columna_npedido = ""; 
              if ($this->columna_npedido_1 != "") 
              { 
                  foreach ($this->columna_npedido_1 as $dados_columna_npedido_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->columna_npedido .= ";";
                      } 
                      $this->columna_npedido .= $dados_columna_npedido_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->columna_reg_pdf_propio))
          {
              $x = 0; 
              $this->columna_reg_pdf_propio_1 = $this->columna_reg_pdf_propio;
              $this->columna_reg_pdf_propio = ""; 
              if ($this->columna_reg_pdf_propio_1 != "") 
              { 
                  foreach ($this->columna_reg_pdf_propio_1 as $dados_columna_reg_pdf_propio_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->columna_reg_pdf_propio .= ";";
                      } 
                      $this->columna_reg_pdf_propio .= $dados_columna_reg_pdf_propio_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_grupo))
          {
              $x = 0; 
              $this->ver_grupo_1 = $this->ver_grupo;
              $this->ver_grupo = ""; 
              if ($this->ver_grupo_1 != "") 
              { 
                  foreach ($this->ver_grupo_1 as $dados_ver_grupo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_grupo .= ";";
                      } 
                      $this->ver_grupo .= $dados_ver_grupo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_codigo))
          {
              $x = 0; 
              $this->ver_codigo_1 = $this->ver_codigo;
              $this->ver_codigo = ""; 
              if ($this->ver_codigo_1 != "") 
              { 
                  foreach ($this->ver_codigo_1 as $dados_ver_codigo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_codigo .= ";";
                      } 
                      $this->ver_codigo .= $dados_ver_codigo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_imagen))
          {
              $x = 0; 
              $this->ver_imagen_1 = $this->ver_imagen;
              $this->ver_imagen = ""; 
              if ($this->ver_imagen_1 != "") 
              { 
                  foreach ($this->ver_imagen_1 as $dados_ver_imagen_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_imagen .= ";";
                      } 
                      $this->ver_imagen .= $dados_ver_imagen_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_existencia))
          {
              $x = 0; 
              $this->ver_existencia_1 = $this->ver_existencia;
              $this->ver_existencia = ""; 
              if ($this->ver_existencia_1 != "") 
              { 
                  foreach ($this->ver_existencia_1 as $dados_ver_existencia_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_existencia .= ";";
                      } 
                      $this->ver_existencia .= $dados_ver_existencia_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_unidad))
          {
              $x = 0; 
              $this->ver_unidad_1 = $this->ver_unidad;
              $this->ver_unidad = ""; 
              if ($this->ver_unidad_1 != "") 
              { 
                  foreach ($this->ver_unidad_1 as $dados_ver_unidad_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_unidad .= ";";
                      } 
                      $this->ver_unidad .= $dados_ver_unidad_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_precio))
          {
              $x = 0; 
              $this->ver_precio_1 = $this->ver_precio;
              $this->ver_precio = ""; 
              if ($this->ver_precio_1 != "") 
              { 
                  foreach ($this->ver_precio_1 as $dados_ver_precio_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_precio .= ";";
                      } 
                      $this->ver_precio .= $dados_ver_precio_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_impuesto))
          {
              $x = 0; 
              $this->ver_impuesto_1 = $this->ver_impuesto;
              $this->ver_impuesto = ""; 
              if ($this->ver_impuesto_1 != "") 
              { 
                  foreach ($this->ver_impuesto_1 as $dados_ver_impuesto_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_impuesto .= ";";
                      } 
                      $this->ver_impuesto .= $dados_ver_impuesto_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_stock))
          {
              $x = 0; 
              $this->ver_stock_1 = $this->ver_stock;
              $this->ver_stock = ""; 
              if ($this->ver_stock_1 != "") 
              { 
                  foreach ($this->ver_stock_1 as $dados_ver_stock_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_stock .= ";";
                      } 
                      $this->ver_stock .= $dados_ver_stock_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_ubicacion))
          {
              $x = 0; 
              $this->ver_ubicacion_1 = $this->ver_ubicacion;
              $this->ver_ubicacion = ""; 
              if ($this->ver_ubicacion_1 != "") 
              { 
                  foreach ($this->ver_ubicacion_1 as $dados_ver_ubicacion_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_ubicacion .= ";";
                      } 
                      $this->ver_ubicacion .= $dados_ver_ubicacion_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_costo))
          {
              $x = 0; 
              $this->ver_costo_1 = $this->ver_costo;
              $this->ver_costo = ""; 
              if ($this->ver_costo_1 != "") 
              { 
                  foreach ($this->ver_costo_1 as $dados_ver_costo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_costo .= ";";
                      } 
                      $this->ver_costo .= $dados_ver_costo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_proveedor))
          {
              $x = 0; 
              $this->ver_proveedor_1 = $this->ver_proveedor;
              $this->ver_proveedor = ""; 
              if ($this->ver_proveedor_1 != "") 
              { 
                  foreach ($this->ver_proveedor_1 as $dados_ver_proveedor_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_proveedor .= ";";
                      } 
                      $this->ver_proveedor .= $dados_ver_proveedor_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_combo))
          {
              $x = 0; 
              $this->ver_combo_1 = $this->ver_combo;
              $this->ver_combo = ""; 
              if ($this->ver_combo_1 != "") 
              { 
                  foreach ($this->ver_combo_1 as $dados_ver_combo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_combo .= ";";
                      } 
                      $this->ver_combo .= $dados_ver_combo_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_agregar_nota))
          {
              $x = 0; 
              $this->ver_agregar_nota_1 = $this->ver_agregar_nota;
              $this->ver_agregar_nota = ""; 
              if ($this->ver_agregar_nota_1 != "") 
              { 
                  foreach ($this->ver_agregar_nota_1 as $dados_ver_agregar_nota_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_agregar_nota .= ";";
                      } 
                      $this->ver_agregar_nota .= $dados_ver_agregar_nota_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->ver_busqueda_refinada))
          {
              $x = 0; 
              $this->ver_busqueda_refinada_1 = $this->ver_busqueda_refinada;
              $this->ver_busqueda_refinada = ""; 
              if ($this->ver_busqueda_refinada_1 != "") 
              { 
                  foreach ($this->ver_busqueda_refinada_1 as $dados_ver_busqueda_refinada_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->ver_busqueda_refinada .= ";";
                      } 
                      $this->ver_busqueda_refinada .= $dados_ver_busqueda_refinada_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->validar_codbarras))
          {
              $x = 0; 
              $this->validar_codbarras_1 = $this->validar_codbarras;
              $this->validar_codbarras = ""; 
              if ($this->validar_codbarras_1 != "") 
              { 
                  foreach ($this->validar_codbarras_1 as $dados_validar_codbarras_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->validar_codbarras .= ";";
                      } 
                      $this->validar_codbarras .= $dados_validar_codbarras_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_configuraciones_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_configuraciones_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_configuraciones_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_configuraciones_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_configuraciones.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Configuraciones") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_configuraciones_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_configuraciones"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'lineasporfactura':
               return "LINEAS X FACTURA:";
               break;
           case 'consolidararticulos':
               return "CONSOLIDAR ARTÍCULOS:";
               break;
           case 'serial':
               return "SERIAL:";
               break;
           case 'fecha':
               return "FECHA INICIO:";
               break;
           case 'activo':
               return "ACTIVO:";
               break;
           case 'espaciado':
               return "ESPACIADO DETALLE FACTURA:";
               break;
           case 'minutos_inactividad':
               return "Minutos Inactividad";
               break;
           case 'caja_movil':
               return "LLAMAR CAJA DESDE MÓVIL?:";
               break;
           case 'pago_automatico':
               return "COMPROBANTE DE EGRESO AUTOMÁTICO EN COMPRAS?:";
               break;
           case 'dia_limite_pago':
               return "DÍA LÍMITE DE PAGO";
               break;
           case 'refresh_grid_doc':
               return "ACTUALIZACIÓN COCINA SEGUNDOS:";
               break;
           case 'desactivar_control_sesion':
               return "DESACTIVAR EL CONTROL DE SESIÓN";
               break;
           case 'nombre_pc':
               return "NOMBRE PC DE RED:";
               break;
           case 'nombre_impre':
               return "NOMBRE IMPRESORA DE RED:";
               break;
           case 'essociedad':
               return "Responsable autoretención (Antiguo CREE):";
               break;
           case 'grancontr':
               return "Auto retenedor en la fuente:";
               break;
           case 'idconfiguraciones':
               return "Idconfiguraciones";
               break;
           case 'control_diasmora':
               return "CONTROL CARTERA CON DÍAS DE MORA?:";
               break;
           case 'control_costo':
               return "CONTROLAR VENTAS CON VALOR DEL COSTO?:";
               break;
           case 'modificainvpedido':
               return "MODIFICAR INVENTARIO DESDE PEDIDO?:";
               break;
           case 'tipodoc_pordefecto_pos':
               return "DOCUMENTO POR DEFECTO EN POS";
               break;
           case 'ver_xml_fe':
               return "Ver JSON FE";
               break;
           case 'noborrar_tmp_enpos':
               return "NO BORRAR TEMPORALES EN VENTA RÁPIDA";
               break;
           case 'validar_correo_enlinea':
               return "Validar Correo en Línea";
               break;
           case 'apertura_caja':
               return "MANEJAR APERTURA Y CIERRE DE CAJA?:";
               break;
           case 'activar_console_log':
               return "ACTIVAR CONSOLE LOG?:";
               break;
           case 'codproducto_en_facventa':
               return "MOSTRAR CODPRODUCTO EN POS";
               break;
           case 'valor_propina_sugerida':
               return "PORCENTAJE PROPINA SUGERIDA (Restaurantes)";
               break;
           case 'columna_imprimir_ticket':
               return "Columna Imprimir Ticket";
               break;
           case 'columna_imprimir_a4':
               return "Columna Imprimir A4";
               break;
           case 'columna_whatsapp':
               return "Columna Whatsapp";
               break;
           case 'columna_npedido':
               return "Columna No Pedido";
               break;
           case 'columna_reg_pdf_propio':
               return "Columna Regenerar PDF";
               break;
           case 'ver_busqueda_refinada':
               return "Ver Búsqueda Refinada";
               break;
           case 'cal_valores_decimales':
               return "Calcular Valores con Decimales";
               break;
           case 'cal_cantidades_decimales':
               return "Calcular Cantidades con Decimales";
               break;
           case 'validar_codbarras':
               return "Validar Codbarras";
               break;
           case 'ver_grupo':
               return "Ver Grupo/Familia";
               break;
           case 'ver_codigo':
               return "Ver Código";
               break;
           case 'ver_imagen':
               return "Ver Imagen";
               break;
           case 'ver_existencia':
               return "Ver Existencia";
               break;
           case 'ver_unidad':
               return "Ver Unidad";
               break;
           case 'ver_precio':
               return "Ver Precio";
               break;
           case 'ver_impuesto':
               return "Ver Impuesto";
               break;
           case 'ver_stock':
               return "Ver Stock";
               break;
           case 'ver_ubicacion':
               return "Ver Ubicación";
               break;
           case 'ver_costo':
               return "Ver Costo";
               break;
           case 'ver_proveedor':
               return "Ver Proveedor";
               break;
           case 'ver_combo':
               return "Ver Combo";
               break;
           case 'ver_agregar_nota':
               return "Ver Agregar Nota";
               break;
           case 'ultima_edicion':
               return "Ultima Edicion";
               break;
           case 'ruta_bd_tns':
               return "Ruta Bd Tns";
               break;
           case 'ip':
               return "IP Servidor TNS";
               break;
           case 'integrar_tns':
               return "Integrar con TNS:";
               break;
           case 'nube_pedidos':
               return "Pedidos en la Nube";
               break;
           case 'nube_inventario':
               return "Inventario en la Nube";
               break;
           case 'nube_cartera':
               return "Cartera en la Nube";
               break;
           case 'nube_tesoreria':
               return "Tesorería en la Nube";
               break;
           case 'nube_agenda':
               return "Agenda en la Nube";
               break;
           case 'nube_compras':
               return "Compras en la Nube";
               break;
           case 'nube_codigo':
               return "Código Empresa Nube";
               break;
           case 'token':
               return "Token";
               break;
           case 'password':
               return "Password";
               break;
           case 'habilitar_comprobantes':
               return "Habilitar Comprobantes";
               break;
           case 'licencia_activa':
               return "Licencia Activa";
               break;
           case 'fecha_activacion':
               return "Fecha Activacion";
               break;
           case 'cod_cliente':
               return "Cod Cliente";
               break;
           case 'probarnube':
               return "Probar Conexión a la Nube";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_configuraciones']) || !is_array($this->NM_ajax_info['errList']['geral_form_configuraciones']))
              {
                  $this->NM_ajax_info['errList']['geral_form_configuraciones'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_configuraciones'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'lineasporfactura' == $filtro)) || (is_array($filtro) && in_array('lineasporfactura', $filtro)))
        $this->ValidateField_lineasporfactura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'consolidararticulos' == $filtro)) || (is_array($filtro) && in_array('consolidararticulos', $filtro)))
        $this->ValidateField_consolidararticulos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'serial' == $filtro)) || (is_array($filtro) && in_array('serial', $filtro)))
        $this->ValidateField_serial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'fecha' == $filtro)) || (is_array($filtro) && in_array('fecha', $filtro)))
        $this->ValidateField_fecha($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'activo' == $filtro)) || (is_array($filtro) && in_array('activo', $filtro)))
        $this->ValidateField_activo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'espaciado' == $filtro)) || (is_array($filtro) && in_array('espaciado', $filtro)))
        $this->ValidateField_espaciado($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'minutos_inactividad' == $filtro)) || (is_array($filtro) && in_array('minutos_inactividad', $filtro)))
        $this->ValidateField_minutos_inactividad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'caja_movil' == $filtro)) || (is_array($filtro) && in_array('caja_movil', $filtro)))
        $this->ValidateField_caja_movil($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pago_automatico' == $filtro)) || (is_array($filtro) && in_array('pago_automatico', $filtro)))
        $this->ValidateField_pago_automatico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'dia_limite_pago' == $filtro)) || (is_array($filtro) && in_array('dia_limite_pago', $filtro)))
        $this->ValidateField_dia_limite_pago($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'refresh_grid_doc' == $filtro)) || (is_array($filtro) && in_array('refresh_grid_doc', $filtro)))
        $this->ValidateField_refresh_grid_doc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'desactivar_control_sesion' == $filtro)) || (is_array($filtro) && in_array('desactivar_control_sesion', $filtro)))
        $this->ValidateField_desactivar_control_sesion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre_pc' == $filtro)) || (is_array($filtro) && in_array('nombre_pc', $filtro)))
        $this->ValidateField_nombre_pc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombre_impre' == $filtro)) || (is_array($filtro) && in_array('nombre_impre', $filtro)))
        $this->ValidateField_nombre_impre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'essociedad' == $filtro)) || (is_array($filtro) && in_array('essociedad', $filtro)))
        $this->ValidateField_essociedad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'grancontr' == $filtro)) || (is_array($filtro) && in_array('grancontr', $filtro)))
        $this->ValidateField_grancontr($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'idconfiguraciones' == $filtro)) || (is_array($filtro) && in_array('idconfiguraciones', $filtro)))
        $this->ValidateField_idconfiguraciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'control_diasmora' == $filtro)) || (is_array($filtro) && in_array('control_diasmora', $filtro)))
        $this->ValidateField_control_diasmora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'control_costo' == $filtro)) || (is_array($filtro) && in_array('control_costo', $filtro)))
        $this->ValidateField_control_costo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'modificainvpedido' == $filtro)) || (is_array($filtro) && in_array('modificainvpedido', $filtro)))
        $this->ValidateField_modificainvpedido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tipodoc_pordefecto_pos' == $filtro)) || (is_array($filtro) && in_array('tipodoc_pordefecto_pos', $filtro)))
        $this->ValidateField_tipodoc_pordefecto_pos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_xml_fe' == $filtro)) || (is_array($filtro) && in_array('ver_xml_fe', $filtro)))
        $this->ValidateField_ver_xml_fe($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'noborrar_tmp_enpos' == $filtro)) || (is_array($filtro) && in_array('noborrar_tmp_enpos', $filtro)))
        $this->ValidateField_noborrar_tmp_enpos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'validar_correo_enlinea' == $filtro)) || (is_array($filtro) && in_array('validar_correo_enlinea', $filtro)))
        $this->ValidateField_validar_correo_enlinea($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'apertura_caja' == $filtro)) || (is_array($filtro) && in_array('apertura_caja', $filtro)))
        $this->ValidateField_apertura_caja($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'activar_console_log' == $filtro)) || (is_array($filtro) && in_array('activar_console_log', $filtro)))
        $this->ValidateField_activar_console_log($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'codproducto_en_facventa' == $filtro)) || (is_array($filtro) && in_array('codproducto_en_facventa', $filtro)))
        $this->ValidateField_codproducto_en_facventa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'valor_propina_sugerida' == $filtro)) || (is_array($filtro) && in_array('valor_propina_sugerida', $filtro)))
        $this->ValidateField_valor_propina_sugerida($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'columna_imprimir_ticket' == $filtro)) || (is_array($filtro) && in_array('columna_imprimir_ticket', $filtro)))
        $this->ValidateField_columna_imprimir_ticket($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'columna_imprimir_a4' == $filtro)) || (is_array($filtro) && in_array('columna_imprimir_a4', $filtro)))
        $this->ValidateField_columna_imprimir_a4($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'columna_whatsapp' == $filtro)) || (is_array($filtro) && in_array('columna_whatsapp', $filtro)))
        $this->ValidateField_columna_whatsapp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'columna_npedido' == $filtro)) || (is_array($filtro) && in_array('columna_npedido', $filtro)))
        $this->ValidateField_columna_npedido($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'columna_reg_pdf_propio' == $filtro)) || (is_array($filtro) && in_array('columna_reg_pdf_propio', $filtro)))
        $this->ValidateField_columna_reg_pdf_propio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_busqueda_refinada' == $filtro)) || (is_array($filtro) && in_array('ver_busqueda_refinada', $filtro)))
        $this->ValidateField_ver_busqueda_refinada($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cal_valores_decimales' == $filtro)) || (is_array($filtro) && in_array('cal_valores_decimales', $filtro)))
        $this->ValidateField_cal_valores_decimales($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cal_cantidades_decimales' == $filtro)) || (is_array($filtro) && in_array('cal_cantidades_decimales', $filtro)))
        $this->ValidateField_cal_cantidades_decimales($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'validar_codbarras' == $filtro)) || (is_array($filtro) && in_array('validar_codbarras', $filtro)))
        $this->ValidateField_validar_codbarras($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_grupo' == $filtro)) || (is_array($filtro) && in_array('ver_grupo', $filtro)))
        $this->ValidateField_ver_grupo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_codigo' == $filtro)) || (is_array($filtro) && in_array('ver_codigo', $filtro)))
        $this->ValidateField_ver_codigo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_imagen' == $filtro)) || (is_array($filtro) && in_array('ver_imagen', $filtro)))
        $this->ValidateField_ver_imagen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_existencia' == $filtro)) || (is_array($filtro) && in_array('ver_existencia', $filtro)))
        $this->ValidateField_ver_existencia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_unidad' == $filtro)) || (is_array($filtro) && in_array('ver_unidad', $filtro)))
        $this->ValidateField_ver_unidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_precio' == $filtro)) || (is_array($filtro) && in_array('ver_precio', $filtro)))
        $this->ValidateField_ver_precio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_impuesto' == $filtro)) || (is_array($filtro) && in_array('ver_impuesto', $filtro)))
        $this->ValidateField_ver_impuesto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_stock' == $filtro)) || (is_array($filtro) && in_array('ver_stock', $filtro)))
        $this->ValidateField_ver_stock($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_ubicacion' == $filtro)) || (is_array($filtro) && in_array('ver_ubicacion', $filtro)))
        $this->ValidateField_ver_ubicacion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_costo' == $filtro)) || (is_array($filtro) && in_array('ver_costo', $filtro)))
        $this->ValidateField_ver_costo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_proveedor' == $filtro)) || (is_array($filtro) && in_array('ver_proveedor', $filtro)))
        $this->ValidateField_ver_proveedor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_combo' == $filtro)) || (is_array($filtro) && in_array('ver_combo', $filtro)))
        $this->ValidateField_ver_combo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'ver_agregar_nota' == $filtro)) || (is_array($filtro) && in_array('ver_agregar_nota', $filtro)))
        $this->ValidateField_ver_agregar_nota($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
  

$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off'; 
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_lineasporfactura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->lineasporfactura, explode(';', "99")))  
          { 
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['lineasporfactura']))
              {
                  $Campos_Erros['lineasporfactura'] = array();
              }
              $Campos_Erros['lineasporfactura'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['lineasporfactura']) || !is_array($this->NM_ajax_info['errList']['lineasporfactura']))
                  {
                      $this->NM_ajax_info['errList']['lineasporfactura'] = array();
                  }
                  $this->NM_ajax_info['errList']['lineasporfactura'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->lineasporfactura, "99", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->lineasporfactura, $this->field_config['lineasporfactura']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->lineasporfactura != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->lineasporfactura) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "LINEAS X FACTURA:: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['lineasporfactura']))
                  {
                      $Campos_Erros['lineasporfactura'] = array();
                  }
                  $Campos_Erros['lineasporfactura'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['lineasporfactura']) || !is_array($this->NM_ajax_info['errList']['lineasporfactura']))
                  {
                      $this->NM_ajax_info['errList']['lineasporfactura'] = array();
                  }
                  $this->NM_ajax_info['errList']['lineasporfactura'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->lineasporfactura, 2, 0, 1, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "LINEAS X FACTURA:; " ; 
                  if (!isset($Campos_Erros['lineasporfactura']))
                  {
                      $Campos_Erros['lineasporfactura'] = array();
                  }
                  $Campos_Erros['lineasporfactura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['lineasporfactura']) || !is_array($this->NM_ajax_info['errList']['lineasporfactura']))
                  {
                      $this->NM_ajax_info['errList']['lineasporfactura'] = array();
                  }
                  $this->NM_ajax_info['errList']['lineasporfactura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['lineasporfactura']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['lineasporfactura'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "LINEAS X FACTURA:" ; 
              if (!isset($Campos_Erros['lineasporfactura']))
              {
                  $Campos_Erros['lineasporfactura'] = array();
              }
              $Campos_Erros['lineasporfactura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['lineasporfactura']) || !is_array($this->NM_ajax_info['errList']['lineasporfactura']))
                  {
                      $this->NM_ajax_info['errList']['lineasporfactura'] = array();
                  }
                  $this->NM_ajax_info['errList']['lineasporfactura'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lineasporfactura';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lineasporfactura

    function ValidateField_consolidararticulos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->consolidararticulos == "" && $this->nmgp_opcao != "excluir")
      { 
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['consolidararticulos']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['php_cmp_required']['consolidararticulos'] == "on")
        { 
          $hasError = true;
          $Campos_Falta[] = "CONSOLIDAR ARTÍCULOS:" ;
          if (!isset($Campos_Erros['consolidararticulos']))
          {
              $Campos_Erros['consolidararticulos'] = array();
          }
          $Campos_Erros['consolidararticulos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['consolidararticulos']) || !is_array($this->NM_ajax_info['errList']['consolidararticulos']))
                  {
                      $this->NM_ajax_info['errList']['consolidararticulos'] = array();
                  }
                  $this->NM_ajax_info['errList']['consolidararticulos'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
        } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'consolidararticulos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_consolidararticulos

    function ValidateField_serial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->serial) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "SERIAL: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['serial']))
              {
                  $Campos_Erros['serial'] = array();
              }
              $Campos_Erros['serial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['serial']) || !is_array($this->NM_ajax_info['errList']['serial']))
              {
                  $this->NM_ajax_info['errList']['serial'] = array();
              }
              $this->NM_ajax_info['errList']['serial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'serial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_serial

    function ValidateField_fecha(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->fecha, $this->field_config['fecha']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fecha']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fecha']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fecha']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fecha']['date_sep']) ; 
          if (trim($this->fecha) != "")  
          { 
              if ($teste_validade->Data($this->fecha, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "FECHA INICIO:; " ; 
                  if (!isset($Campos_Erros['fecha']))
                  {
                      $Campos_Erros['fecha'] = array();
                  }
                  $Campos_Erros['fecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fecha']) || !is_array($this->NM_ajax_info['errList']['fecha']))
                  {
                      $this->NM_ajax_info['errList']['fecha'] = array();
                  }
                  $this->NM_ajax_info['errList']['fecha'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fecha']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'fecha';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_fecha

    function ValidateField_activo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->activo) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "ACTIVO: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['activo']))
              {
                  $Campos_Erros['activo'] = array();
              }
              $Campos_Erros['activo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['activo']) || !is_array($this->NM_ajax_info['errList']['activo']))
              {
                  $this->NM_ajax_info['errList']['activo'] = array();
              }
              $this->NM_ajax_info['errList']['activo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'activo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_activo

    function ValidateField_espaciado(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->espaciado === "" || is_null($this->espaciado))  
      { 
          $this->espaciado = 0;
          $this->sc_force_zero[] = 'espaciado';
      } 
      if (!empty($this->field_config['espaciado']['symbol_dec']))
      {
          nm_limpa_valor($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp']) ; 
          if ('.' == substr($this->espaciado, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->espaciado, 1)))
              {
                  $this->espaciado = '';
              }
              else
              {
                  $this->espaciado = '0' . $this->espaciado;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->espaciado != '')  
          { 
              $iTestSize = 13;
              if (strlen($this->espaciado) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ESPACIADO DETALLE FACTURA:: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['espaciado']))
                  {
                      $Campos_Erros['espaciado'] = array();
                  }
                  $Campos_Erros['espaciado'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['espaciado']) || !is_array($this->NM_ajax_info['errList']['espaciado']))
                  {
                      $this->NM_ajax_info['errList']['espaciado'] = array();
                  }
                  $this->NM_ajax_info['errList']['espaciado'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->espaciado, 11, 1, 3.5, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ESPACIADO DETALLE FACTURA:; " ; 
                  if (!isset($Campos_Erros['espaciado']))
                  {
                      $Campos_Erros['espaciado'] = array();
                  }
                  $Campos_Erros['espaciado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['espaciado']) || !is_array($this->NM_ajax_info['errList']['espaciado']))
                  {
                      $this->NM_ajax_info['errList']['espaciado'] = array();
                  }
                  $this->NM_ajax_info['errList']['espaciado'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'espaciado';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_espaciado

    function ValidateField_minutos_inactividad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->minutos_inactividad === "" || is_null($this->minutos_inactividad))  
      { 
          $this->minutos_inactividad = 0;
          $this->sc_force_zero[] = 'minutos_inactividad';
      } 
      nm_limpa_numero($this->minutos_inactividad, $this->field_config['minutos_inactividad']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->minutos_inactividad != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->minutos_inactividad) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Minutos Inactividad: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['minutos_inactividad']))
                  {
                      $Campos_Erros['minutos_inactividad'] = array();
                  }
                  $Campos_Erros['minutos_inactividad'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['minutos_inactividad']) || !is_array($this->NM_ajax_info['errList']['minutos_inactividad']))
                  {
                      $this->NM_ajax_info['errList']['minutos_inactividad'] = array();
                  }
                  $this->NM_ajax_info['errList']['minutos_inactividad'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->minutos_inactividad, 11, 0, 1, 1440, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Minutos Inactividad; " ; 
                  if (!isset($Campos_Erros['minutos_inactividad']))
                  {
                      $Campos_Erros['minutos_inactividad'] = array();
                  }
                  $Campos_Erros['minutos_inactividad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['minutos_inactividad']) || !is_array($this->NM_ajax_info['errList']['minutos_inactividad']))
                  {
                      $this->NM_ajax_info['errList']['minutos_inactividad'] = array();
                  }
                  $this->NM_ajax_info['errList']['minutos_inactividad'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'minutos_inactividad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_minutos_inactividad

    function ValidateField_caja_movil(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->caja_movil == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->caja_movil = "NO";
      } 
      else 
      { 
          if (is_array($this->caja_movil))
          {
              $x = 0; 
              $this->caja_movil_1 = array(); 
              foreach ($this->caja_movil as $ind => $dados_caja_movil_1 ) 
              {
                  if ($dados_caja_movil_1 != "") 
                  {
                      $this->caja_movil_1[] = $dados_caja_movil_1;
                  } 
              } 
              $this->caja_movil = ""; 
              foreach ($this->caja_movil_1 as $dados_caja_movil_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->caja_movil .= ";";
                   } 
                   $this->caja_movil .= $dados_caja_movil_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'caja_movil';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_caja_movil

    function ValidateField_pago_automatico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->pago_automatico == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->pago_automatico = "NO";
      } 
      else 
      { 
          if (is_array($this->pago_automatico))
          {
              $x = 0; 
              $this->pago_automatico_1 = array(); 
              foreach ($this->pago_automatico as $ind => $dados_pago_automatico_1 ) 
              {
                  if ($dados_pago_automatico_1 != "") 
                  {
                      $this->pago_automatico_1[] = $dados_pago_automatico_1;
                  } 
              } 
              $this->pago_automatico = ""; 
              foreach ($this->pago_automatico_1 as $dados_pago_automatico_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->pago_automatico .= ";";
                   } 
                   $this->pago_automatico .= $dados_pago_automatico_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pago_automatico';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pago_automatico

    function ValidateField_dia_limite_pago(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->dia_limite_pago === "" || is_null($this->dia_limite_pago))  
      { 
          $this->dia_limite_pago = 0;
          $this->sc_force_zero[] = 'dia_limite_pago';
      } 
      nm_limpa_numero($this->dia_limite_pago, $this->field_config['dia_limite_pago']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->dia_limite_pago != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->dia_limite_pago) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DÍA LÍMITE DE PAGO: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['dia_limite_pago']))
                  {
                      $Campos_Erros['dia_limite_pago'] = array();
                  }
                  $Campos_Erros['dia_limite_pago'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['dia_limite_pago']) || !is_array($this->NM_ajax_info['errList']['dia_limite_pago']))
                  {
                      $this->NM_ajax_info['errList']['dia_limite_pago'] = array();
                  }
                  $this->NM_ajax_info['errList']['dia_limite_pago'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->dia_limite_pago, 2, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "DÍA LÍMITE DE PAGO; " ; 
                  if (!isset($Campos_Erros['dia_limite_pago']))
                  {
                      $Campos_Erros['dia_limite_pago'] = array();
                  }
                  $Campos_Erros['dia_limite_pago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['dia_limite_pago']) || !is_array($this->NM_ajax_info['errList']['dia_limite_pago']))
                  {
                      $this->NM_ajax_info['errList']['dia_limite_pago'] = array();
                  }
                  $this->NM_ajax_info['errList']['dia_limite_pago'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'dia_limite_pago';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_dia_limite_pago

    function ValidateField_refresh_grid_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->refresh_grid_doc === "" || is_null($this->refresh_grid_doc))  
      { 
          $this->refresh_grid_doc = 0;
          $this->sc_force_zero[] = 'refresh_grid_doc';
      } 
      nm_limpa_numero($this->refresh_grid_doc, $this->field_config['refresh_grid_doc']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->refresh_grid_doc != '')  
          { 
              $iTestSize = 4;
              if (strlen($this->refresh_grid_doc) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ACTUALIZACIÓN COCINA SEGUNDOS:: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['refresh_grid_doc']))
                  {
                      $Campos_Erros['refresh_grid_doc'] = array();
                  }
                  $Campos_Erros['refresh_grid_doc'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['refresh_grid_doc']) || !is_array($this->NM_ajax_info['errList']['refresh_grid_doc']))
                  {
                      $this->NM_ajax_info['errList']['refresh_grid_doc'] = array();
                  }
                  $this->NM_ajax_info['errList']['refresh_grid_doc'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->refresh_grid_doc, 4, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ACTUALIZACIÓN COCINA SEGUNDOS:; " ; 
                  if (!isset($Campos_Erros['refresh_grid_doc']))
                  {
                      $Campos_Erros['refresh_grid_doc'] = array();
                  }
                  $Campos_Erros['refresh_grid_doc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['refresh_grid_doc']) || !is_array($this->NM_ajax_info['errList']['refresh_grid_doc']))
                  {
                      $this->NM_ajax_info['errList']['refresh_grid_doc'] = array();
                  }
                  $this->NM_ajax_info['errList']['refresh_grid_doc'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'refresh_grid_doc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_refresh_grid_doc

    function ValidateField_desactivar_control_sesion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->desactivar_control_sesion == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->desactivar_control_sesion = "NO";
      } 
      else 
      { 
          if (is_array($this->desactivar_control_sesion))
          {
              $x = 0; 
              $this->desactivar_control_sesion_1 = array(); 
              foreach ($this->desactivar_control_sesion as $ind => $dados_desactivar_control_sesion_1 ) 
              {
                  if ($dados_desactivar_control_sesion_1 != "") 
                  {
                      $this->desactivar_control_sesion_1[] = $dados_desactivar_control_sesion_1;
                  } 
              } 
              $this->desactivar_control_sesion = ""; 
              foreach ($this->desactivar_control_sesion_1 as $dados_desactivar_control_sesion_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->desactivar_control_sesion .= ";";
                   } 
                   $this->desactivar_control_sesion .= $dados_desactivar_control_sesion_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'desactivar_control_sesion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_desactivar_control_sesion

    function ValidateField_nombre_pc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_pc) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRE PC DE RED: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_pc']))
              {
                  $Campos_Erros['nombre_pc'] = array();
              }
              $Campos_Erros['nombre_pc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_pc']) || !is_array($this->NM_ajax_info['errList']['nombre_pc']))
              {
                  $this->NM_ajax_info['errList']['nombre_pc'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_pc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_pc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_pc

    function ValidateField_nombre_impre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_impre) > 32) 
          { 
              $hasError = true;
              $Campos_Crit .= "NOMBRE IMPRESORA DE RED: " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_impre']))
              {
                  $Campos_Erros['nombre_impre'] = array();
              }
              $Campos_Erros['nombre_impre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_impre']) || !is_array($this->NM_ajax_info['errList']['nombre_impre']))
              {
                  $this->NM_ajax_info['errList']['nombre_impre'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_impre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_impre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_impre

    function ValidateField_essociedad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->essociedad == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->essociedad = "NO";
      } 
      else 
      { 
          if (is_array($this->essociedad))
          {
              $x = 0; 
              $this->essociedad_1 = array(); 
              foreach ($this->essociedad as $ind => $dados_essociedad_1 ) 
              {
                  if ($dados_essociedad_1 != "") 
                  {
                      $this->essociedad_1[] = $dados_essociedad_1;
                  } 
              } 
              $this->essociedad = ""; 
              foreach ($this->essociedad_1 as $dados_essociedad_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->essociedad .= ";";
                   } 
                   $this->essociedad .= $dados_essociedad_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'essociedad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_essociedad

    function ValidateField_grancontr(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->grancontr == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->grancontr = "NO";
      } 
      else 
      { 
          if (is_array($this->grancontr))
          {
              $x = 0; 
              $this->grancontr_1 = array(); 
              foreach ($this->grancontr as $ind => $dados_grancontr_1 ) 
              {
                  if ($dados_grancontr_1 != "") 
                  {
                      $this->grancontr_1[] = $dados_grancontr_1;
                  } 
              } 
              $this->grancontr = ""; 
              foreach ($this->grancontr_1 as $dados_grancontr_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->grancontr .= ";";
                   } 
                   $this->grancontr .= $dados_grancontr_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'grancontr';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_grancontr

    function ValidateField_idconfiguraciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->idconfiguraciones === "" || is_null($this->idconfiguraciones))  
      { 
          $this->idconfiguraciones = 0;
      } 
      nm_limpa_numero($this->idconfiguraciones, $this->field_config['idconfiguraciones']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->idconfiguraciones != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->idconfiguraciones) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idconfiguraciones: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['idconfiguraciones']))
                  {
                      $Campos_Erros['idconfiguraciones'] = array();
                  }
                  $Campos_Erros['idconfiguraciones'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['idconfiguraciones']) || !is_array($this->NM_ajax_info['errList']['idconfiguraciones']))
                  {
                      $this->NM_ajax_info['errList']['idconfiguraciones'] = array();
                  }
                  $this->NM_ajax_info['errList']['idconfiguraciones'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->idconfiguraciones, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Idconfiguraciones; " ; 
                  if (!isset($Campos_Erros['idconfiguraciones']))
                  {
                      $Campos_Erros['idconfiguraciones'] = array();
                  }
                  $Campos_Erros['idconfiguraciones'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['idconfiguraciones']) || !is_array($this->NM_ajax_info['errList']['idconfiguraciones']))
                  {
                      $this->NM_ajax_info['errList']['idconfiguraciones'] = array();
                  }
                  $this->NM_ajax_info['errList']['idconfiguraciones'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idconfiguraciones';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idconfiguraciones

    function ValidateField_control_diasmora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->control_diasmora == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->control_diasmora = "NO";
      } 
      else 
      { 
          if (is_array($this->control_diasmora))
          {
              $x = 0; 
              $this->control_diasmora_1 = array(); 
              foreach ($this->control_diasmora as $ind => $dados_control_diasmora_1 ) 
              {
                  if ($dados_control_diasmora_1 != "") 
                  {
                      $this->control_diasmora_1[] = $dados_control_diasmora_1;
                  } 
              } 
              $this->control_diasmora = ""; 
              foreach ($this->control_diasmora_1 as $dados_control_diasmora_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->control_diasmora .= ";";
                   } 
                   $this->control_diasmora .= $dados_control_diasmora_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'control_diasmora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_control_diasmora

    function ValidateField_control_costo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->control_costo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->control_costo = "NO";
      } 
      else 
      { 
          if (is_array($this->control_costo))
          {
              $x = 0; 
              $this->control_costo_1 = array(); 
              foreach ($this->control_costo as $ind => $dados_control_costo_1 ) 
              {
                  if ($dados_control_costo_1 != "") 
                  {
                      $this->control_costo_1[] = $dados_control_costo_1;
                  } 
              } 
              $this->control_costo = ""; 
              foreach ($this->control_costo_1 as $dados_control_costo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->control_costo .= ";";
                   } 
                   $this->control_costo .= $dados_control_costo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'control_costo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_control_costo

    function ValidateField_modificainvpedido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->modificainvpedido == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->modificainvpedido = "NO";
      } 
      else 
      { 
          if (is_array($this->modificainvpedido))
          {
              $x = 0; 
              $this->modificainvpedido_1 = array(); 
              foreach ($this->modificainvpedido as $ind => $dados_modificainvpedido_1 ) 
              {
                  if ($dados_modificainvpedido_1 != "") 
                  {
                      $this->modificainvpedido_1[] = $dados_modificainvpedido_1;
                  } 
              } 
              $this->modificainvpedido = ""; 
              foreach ($this->modificainvpedido_1 as $dados_modificainvpedido_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->modificainvpedido .= ";";
                   } 
                   $this->modificainvpedido .= $dados_modificainvpedido_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'modificainvpedido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_modificainvpedido

    function ValidateField_tipodoc_pordefecto_pos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tipodoc_pordefecto_pos == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tipodoc_pordefecto_pos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tipodoc_pordefecto_pos

    function ValidateField_ver_xml_fe(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_xml_fe == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_xml_fe = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_xml_fe))
          {
              $x = 0; 
              $this->ver_xml_fe_1 = array(); 
              foreach ($this->ver_xml_fe as $ind => $dados_ver_xml_fe_1 ) 
              {
                  if ($dados_ver_xml_fe_1 != "") 
                  {
                      $this->ver_xml_fe_1[] = $dados_ver_xml_fe_1;
                  } 
              } 
              $this->ver_xml_fe = ""; 
              foreach ($this->ver_xml_fe_1 as $dados_ver_xml_fe_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_xml_fe .= ";";
                   } 
                   $this->ver_xml_fe .= $dados_ver_xml_fe_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_xml_fe';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_xml_fe

    function ValidateField_noborrar_tmp_enpos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->noborrar_tmp_enpos == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->noborrar_tmp_enpos = "NO";
      } 
      else 
      { 
          if (is_array($this->noborrar_tmp_enpos))
          {
              $x = 0; 
              $this->noborrar_tmp_enpos_1 = array(); 
              foreach ($this->noborrar_tmp_enpos as $ind => $dados_noborrar_tmp_enpos_1 ) 
              {
                  if ($dados_noborrar_tmp_enpos_1 != "") 
                  {
                      $this->noborrar_tmp_enpos_1[] = $dados_noborrar_tmp_enpos_1;
                  } 
              } 
              $this->noborrar_tmp_enpos = ""; 
              foreach ($this->noborrar_tmp_enpos_1 as $dados_noborrar_tmp_enpos_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->noborrar_tmp_enpos .= ";";
                   } 
                   $this->noborrar_tmp_enpos .= $dados_noborrar_tmp_enpos_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'noborrar_tmp_enpos';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_noborrar_tmp_enpos

    function ValidateField_validar_correo_enlinea(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->validar_correo_enlinea == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->validar_correo_enlinea = "NO";
      } 
      else 
      { 
          if (is_array($this->validar_correo_enlinea))
          {
              $x = 0; 
              $this->validar_correo_enlinea_1 = array(); 
              foreach ($this->validar_correo_enlinea as $ind => $dados_validar_correo_enlinea_1 ) 
              {
                  if ($dados_validar_correo_enlinea_1 != "") 
                  {
                      $this->validar_correo_enlinea_1[] = $dados_validar_correo_enlinea_1;
                  } 
              } 
              $this->validar_correo_enlinea = ""; 
              foreach ($this->validar_correo_enlinea_1 as $dados_validar_correo_enlinea_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->validar_correo_enlinea .= ";";
                   } 
                   $this->validar_correo_enlinea .= $dados_validar_correo_enlinea_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'validar_correo_enlinea';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_validar_correo_enlinea

    function ValidateField_apertura_caja(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->apertura_caja == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->apertura_caja = "NO";
      } 
      else 
      { 
          if (is_array($this->apertura_caja))
          {
              $x = 0; 
              $this->apertura_caja_1 = array(); 
              foreach ($this->apertura_caja as $ind => $dados_apertura_caja_1 ) 
              {
                  if ($dados_apertura_caja_1 != "") 
                  {
                      $this->apertura_caja_1[] = $dados_apertura_caja_1;
                  } 
              } 
              $this->apertura_caja = ""; 
              foreach ($this->apertura_caja_1 as $dados_apertura_caja_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->apertura_caja .= ";";
                   } 
                   $this->apertura_caja .= $dados_apertura_caja_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apertura_caja';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apertura_caja

    function ValidateField_activar_console_log(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->activar_console_log == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->activar_console_log = "NO";
      } 
      else 
      { 
          if (is_array($this->activar_console_log))
          {
              $x = 0; 
              $this->activar_console_log_1 = array(); 
              foreach ($this->activar_console_log as $ind => $dados_activar_console_log_1 ) 
              {
                  if ($dados_activar_console_log_1 != "") 
                  {
                      $this->activar_console_log_1[] = $dados_activar_console_log_1;
                  } 
              } 
              $this->activar_console_log = ""; 
              foreach ($this->activar_console_log_1 as $dados_activar_console_log_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->activar_console_log .= ";";
                   } 
                   $this->activar_console_log .= $dados_activar_console_log_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'activar_console_log';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_activar_console_log

    function ValidateField_codproducto_en_facventa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->codproducto_en_facventa == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->codproducto_en_facventa = "NO";
      } 
      else 
      { 
          if (is_array($this->codproducto_en_facventa))
          {
              $x = 0; 
              $this->codproducto_en_facventa_1 = array(); 
              foreach ($this->codproducto_en_facventa as $ind => $dados_codproducto_en_facventa_1 ) 
              {
                  if ($dados_codproducto_en_facventa_1 != "") 
                  {
                      $this->codproducto_en_facventa_1[] = $dados_codproducto_en_facventa_1;
                  } 
              } 
              $this->codproducto_en_facventa = ""; 
              foreach ($this->codproducto_en_facventa_1 as $dados_codproducto_en_facventa_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->codproducto_en_facventa .= ";";
                   } 
                   $this->codproducto_en_facventa .= $dados_codproducto_en_facventa_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codproducto_en_facventa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codproducto_en_facventa

    function ValidateField_valor_propina_sugerida(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->valor_propina_sugerida === "" || is_null($this->valor_propina_sugerida))  
      { 
          $this->valor_propina_sugerida = 0;
          $this->sc_force_zero[] = 'valor_propina_sugerida';
      } 
      if (!empty($this->field_config['valor_propina_sugerida']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valor_propina_sugerida, $this->field_config['valor_propina_sugerida']['symbol_dec'], $this->field_config['valor_propina_sugerida']['symbol_grp'], $this->field_config['valor_propina_sugerida']['symbol_mon']); 
          nm_limpa_valor($this->valor_propina_sugerida, $this->field_config['valor_propina_sugerida']['symbol_dec'], $this->field_config['valor_propina_sugerida']['symbol_grp']) ; 
          if ('.' == substr($this->valor_propina_sugerida, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valor_propina_sugerida, 1)))
              {
                  $this->valor_propina_sugerida = '';
              }
              else
              {
                  $this->valor_propina_sugerida = '0' . $this->valor_propina_sugerida;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valor_propina_sugerida != '')  
          { 
              $iTestSize = 16;
              if (strlen($this->valor_propina_sugerida) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PORCENTAJE PROPINA SUGERIDA (Restaurantes): " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valor_propina_sugerida']))
                  {
                      $Campos_Erros['valor_propina_sugerida'] = array();
                  }
                  $Campos_Erros['valor_propina_sugerida'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valor_propina_sugerida']) || !is_array($this->NM_ajax_info['errList']['valor_propina_sugerida']))
                  {
                      $this->NM_ajax_info['errList']['valor_propina_sugerida'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_propina_sugerida'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valor_propina_sugerida, 15, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "PORCENTAJE PROPINA SUGERIDA (Restaurantes); " ; 
                  if (!isset($Campos_Erros['valor_propina_sugerida']))
                  {
                      $Campos_Erros['valor_propina_sugerida'] = array();
                  }
                  $Campos_Erros['valor_propina_sugerida'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valor_propina_sugerida']) || !is_array($this->NM_ajax_info['errList']['valor_propina_sugerida']))
                  {
                      $this->NM_ajax_info['errList']['valor_propina_sugerida'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_propina_sugerida'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valor_propina_sugerida';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valor_propina_sugerida

    function ValidateField_columna_imprimir_ticket(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->columna_imprimir_ticket == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->columna_imprimir_ticket = "NO";
      } 
      else 
      { 
          if (is_array($this->columna_imprimir_ticket))
          {
              $x = 0; 
              $this->columna_imprimir_ticket_1 = array(); 
              foreach ($this->columna_imprimir_ticket as $ind => $dados_columna_imprimir_ticket_1 ) 
              {
                  if ($dados_columna_imprimir_ticket_1 != "") 
                  {
                      $this->columna_imprimir_ticket_1[] = $dados_columna_imprimir_ticket_1;
                  } 
              } 
              $this->columna_imprimir_ticket = ""; 
              foreach ($this->columna_imprimir_ticket_1 as $dados_columna_imprimir_ticket_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->columna_imprimir_ticket .= ";";
                   } 
                   $this->columna_imprimir_ticket .= $dados_columna_imprimir_ticket_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'columna_imprimir_ticket';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_columna_imprimir_ticket

    function ValidateField_columna_imprimir_a4(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->columna_imprimir_a4 == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->columna_imprimir_a4 = "NO";
      } 
      else 
      { 
          if (is_array($this->columna_imprimir_a4))
          {
              $x = 0; 
              $this->columna_imprimir_a4_1 = array(); 
              foreach ($this->columna_imprimir_a4 as $ind => $dados_columna_imprimir_a4_1 ) 
              {
                  if ($dados_columna_imprimir_a4_1 != "") 
                  {
                      $this->columna_imprimir_a4_1[] = $dados_columna_imprimir_a4_1;
                  } 
              } 
              $this->columna_imprimir_a4 = ""; 
              foreach ($this->columna_imprimir_a4_1 as $dados_columna_imprimir_a4_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->columna_imprimir_a4 .= ";";
                   } 
                   $this->columna_imprimir_a4 .= $dados_columna_imprimir_a4_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'columna_imprimir_a4';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_columna_imprimir_a4

    function ValidateField_columna_whatsapp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->columna_whatsapp == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->columna_whatsapp = "NO";
      } 
      else 
      { 
          if (is_array($this->columna_whatsapp))
          {
              $x = 0; 
              $this->columna_whatsapp_1 = array(); 
              foreach ($this->columna_whatsapp as $ind => $dados_columna_whatsapp_1 ) 
              {
                  if ($dados_columna_whatsapp_1 != "") 
                  {
                      $this->columna_whatsapp_1[] = $dados_columna_whatsapp_1;
                  } 
              } 
              $this->columna_whatsapp = ""; 
              foreach ($this->columna_whatsapp_1 as $dados_columna_whatsapp_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->columna_whatsapp .= ";";
                   } 
                   $this->columna_whatsapp .= $dados_columna_whatsapp_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'columna_whatsapp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_columna_whatsapp

    function ValidateField_columna_npedido(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->columna_npedido == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->columna_npedido = "NO";
      } 
      else 
      { 
          if (is_array($this->columna_npedido))
          {
              $x = 0; 
              $this->columna_npedido_1 = array(); 
              foreach ($this->columna_npedido as $ind => $dados_columna_npedido_1 ) 
              {
                  if ($dados_columna_npedido_1 != "") 
                  {
                      $this->columna_npedido_1[] = $dados_columna_npedido_1;
                  } 
              } 
              $this->columna_npedido = ""; 
              foreach ($this->columna_npedido_1 as $dados_columna_npedido_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->columna_npedido .= ";";
                   } 
                   $this->columna_npedido .= $dados_columna_npedido_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'columna_npedido';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_columna_npedido

    function ValidateField_columna_reg_pdf_propio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->columna_reg_pdf_propio == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->columna_reg_pdf_propio = "NO";
      } 
      else 
      { 
          if (is_array($this->columna_reg_pdf_propio))
          {
              $x = 0; 
              $this->columna_reg_pdf_propio_1 = array(); 
              foreach ($this->columna_reg_pdf_propio as $ind => $dados_columna_reg_pdf_propio_1 ) 
              {
                  if ($dados_columna_reg_pdf_propio_1 != "") 
                  {
                      $this->columna_reg_pdf_propio_1[] = $dados_columna_reg_pdf_propio_1;
                  } 
              } 
              $this->columna_reg_pdf_propio = ""; 
              foreach ($this->columna_reg_pdf_propio_1 as $dados_columna_reg_pdf_propio_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->columna_reg_pdf_propio .= ";";
                   } 
                   $this->columna_reg_pdf_propio .= $dados_columna_reg_pdf_propio_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'columna_reg_pdf_propio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_columna_reg_pdf_propio

    function ValidateField_ver_busqueda_refinada(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_busqueda_refinada == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_busqueda_refinada = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_busqueda_refinada))
          {
              $x = 0; 
              $this->ver_busqueda_refinada_1 = array(); 
              foreach ($this->ver_busqueda_refinada as $ind => $dados_ver_busqueda_refinada_1 ) 
              {
                  if ($dados_ver_busqueda_refinada_1 != "") 
                  {
                      $this->ver_busqueda_refinada_1[] = $dados_ver_busqueda_refinada_1;
                  } 
              } 
              $this->ver_busqueda_refinada = ""; 
              foreach ($this->ver_busqueda_refinada_1 as $dados_ver_busqueda_refinada_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_busqueda_refinada .= ";";
                   } 
                   $this->ver_busqueda_refinada .= $dados_ver_busqueda_refinada_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_busqueda_refinada';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_busqueda_refinada

    function ValidateField_cal_valores_decimales(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cal_valores_decimales === "" || is_null($this->cal_valores_decimales))  
      { 
          $this->cal_valores_decimales = 0;
          $this->sc_force_zero[] = 'cal_valores_decimales';
      } 
      nm_limpa_numero($this->cal_valores_decimales, $this->field_config['cal_valores_decimales']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cal_valores_decimales != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->cal_valores_decimales) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Calcular Valores con Decimales: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cal_valores_decimales']))
                  {
                      $Campos_Erros['cal_valores_decimales'] = array();
                  }
                  $Campos_Erros['cal_valores_decimales'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cal_valores_decimales']) || !is_array($this->NM_ajax_info['errList']['cal_valores_decimales']))
                  {
                      $this->NM_ajax_info['errList']['cal_valores_decimales'] = array();
                  }
                  $this->NM_ajax_info['errList']['cal_valores_decimales'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cal_valores_decimales, 2, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Calcular Valores con Decimales; " ; 
                  if (!isset($Campos_Erros['cal_valores_decimales']))
                  {
                      $Campos_Erros['cal_valores_decimales'] = array();
                  }
                  $Campos_Erros['cal_valores_decimales'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cal_valores_decimales']) || !is_array($this->NM_ajax_info['errList']['cal_valores_decimales']))
                  {
                      $this->NM_ajax_info['errList']['cal_valores_decimales'] = array();
                  }
                  $this->NM_ajax_info['errList']['cal_valores_decimales'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cal_valores_decimales';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cal_valores_decimales

    function ValidateField_cal_cantidades_decimales(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cal_cantidades_decimales === "" || is_null($this->cal_cantidades_decimales))  
      { 
          $this->cal_cantidades_decimales = 0;
          $this->sc_force_zero[] = 'cal_cantidades_decimales';
      } 
      nm_limpa_numero($this->cal_cantidades_decimales, $this->field_config['cal_cantidades_decimales']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cal_cantidades_decimales != '')  
          { 
              $iTestSize = 2;
              if (strlen($this->cal_cantidades_decimales) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Calcular Cantidades con Decimales: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cal_cantidades_decimales']))
                  {
                      $Campos_Erros['cal_cantidades_decimales'] = array();
                  }
                  $Campos_Erros['cal_cantidades_decimales'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cal_cantidades_decimales']) || !is_array($this->NM_ajax_info['errList']['cal_cantidades_decimales']))
                  {
                      $this->NM_ajax_info['errList']['cal_cantidades_decimales'] = array();
                  }
                  $this->NM_ajax_info['errList']['cal_cantidades_decimales'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cal_cantidades_decimales, 2, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Calcular Cantidades con Decimales; " ; 
                  if (!isset($Campos_Erros['cal_cantidades_decimales']))
                  {
                      $Campos_Erros['cal_cantidades_decimales'] = array();
                  }
                  $Campos_Erros['cal_cantidades_decimales'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cal_cantidades_decimales']) || !is_array($this->NM_ajax_info['errList']['cal_cantidades_decimales']))
                  {
                      $this->NM_ajax_info['errList']['cal_cantidades_decimales'] = array();
                  }
                  $this->NM_ajax_info['errList']['cal_cantidades_decimales'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cal_cantidades_decimales';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cal_cantidades_decimales

    function ValidateField_validar_codbarras(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->validar_codbarras == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->validar_codbarras = "NO";
      } 
      else 
      { 
          if (is_array($this->validar_codbarras))
          {
              $x = 0; 
              $this->validar_codbarras_1 = array(); 
              foreach ($this->validar_codbarras as $ind => $dados_validar_codbarras_1 ) 
              {
                  if ($dados_validar_codbarras_1 != "") 
                  {
                      $this->validar_codbarras_1[] = $dados_validar_codbarras_1;
                  } 
              } 
              $this->validar_codbarras = ""; 
              foreach ($this->validar_codbarras_1 as $dados_validar_codbarras_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->validar_codbarras .= ";";
                   } 
                   $this->validar_codbarras .= $dados_validar_codbarras_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'validar_codbarras';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_validar_codbarras

    function ValidateField_ver_grupo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_grupo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_grupo = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_grupo))
          {
              $x = 0; 
              $this->ver_grupo_1 = array(); 
              foreach ($this->ver_grupo as $ind => $dados_ver_grupo_1 ) 
              {
                  if ($dados_ver_grupo_1 != "") 
                  {
                      $this->ver_grupo_1[] = $dados_ver_grupo_1;
                  } 
              } 
              $this->ver_grupo = ""; 
              foreach ($this->ver_grupo_1 as $dados_ver_grupo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_grupo .= ";";
                   } 
                   $this->ver_grupo .= $dados_ver_grupo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_grupo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_grupo

    function ValidateField_ver_codigo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_codigo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_codigo = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_codigo))
          {
              $x = 0; 
              $this->ver_codigo_1 = array(); 
              foreach ($this->ver_codigo as $ind => $dados_ver_codigo_1 ) 
              {
                  if ($dados_ver_codigo_1 != "") 
                  {
                      $this->ver_codigo_1[] = $dados_ver_codigo_1;
                  } 
              } 
              $this->ver_codigo = ""; 
              foreach ($this->ver_codigo_1 as $dados_ver_codigo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_codigo .= ";";
                   } 
                   $this->ver_codigo .= $dados_ver_codigo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_codigo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_codigo

    function ValidateField_ver_imagen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_imagen == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_imagen = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_imagen))
          {
              $x = 0; 
              $this->ver_imagen_1 = array(); 
              foreach ($this->ver_imagen as $ind => $dados_ver_imagen_1 ) 
              {
                  if ($dados_ver_imagen_1 != "") 
                  {
                      $this->ver_imagen_1[] = $dados_ver_imagen_1;
                  } 
              } 
              $this->ver_imagen = ""; 
              foreach ($this->ver_imagen_1 as $dados_ver_imagen_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_imagen .= ";";
                   } 
                   $this->ver_imagen .= $dados_ver_imagen_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_imagen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_imagen

    function ValidateField_ver_existencia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_existencia == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_existencia = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_existencia))
          {
              $x = 0; 
              $this->ver_existencia_1 = array(); 
              foreach ($this->ver_existencia as $ind => $dados_ver_existencia_1 ) 
              {
                  if ($dados_ver_existencia_1 != "") 
                  {
                      $this->ver_existencia_1[] = $dados_ver_existencia_1;
                  } 
              } 
              $this->ver_existencia = ""; 
              foreach ($this->ver_existencia_1 as $dados_ver_existencia_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_existencia .= ";";
                   } 
                   $this->ver_existencia .= $dados_ver_existencia_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_existencia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_existencia

    function ValidateField_ver_unidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_unidad == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_unidad = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_unidad))
          {
              $x = 0; 
              $this->ver_unidad_1 = array(); 
              foreach ($this->ver_unidad as $ind => $dados_ver_unidad_1 ) 
              {
                  if ($dados_ver_unidad_1 != "") 
                  {
                      $this->ver_unidad_1[] = $dados_ver_unidad_1;
                  } 
              } 
              $this->ver_unidad = ""; 
              foreach ($this->ver_unidad_1 as $dados_ver_unidad_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_unidad .= ";";
                   } 
                   $this->ver_unidad .= $dados_ver_unidad_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_unidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_unidad

    function ValidateField_ver_precio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_precio == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_precio = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_precio))
          {
              $x = 0; 
              $this->ver_precio_1 = array(); 
              foreach ($this->ver_precio as $ind => $dados_ver_precio_1 ) 
              {
                  if ($dados_ver_precio_1 != "") 
                  {
                      $this->ver_precio_1[] = $dados_ver_precio_1;
                  } 
              } 
              $this->ver_precio = ""; 
              foreach ($this->ver_precio_1 as $dados_ver_precio_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_precio .= ";";
                   } 
                   $this->ver_precio .= $dados_ver_precio_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_precio';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_precio

    function ValidateField_ver_impuesto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_impuesto == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_impuesto = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_impuesto))
          {
              $x = 0; 
              $this->ver_impuesto_1 = array(); 
              foreach ($this->ver_impuesto as $ind => $dados_ver_impuesto_1 ) 
              {
                  if ($dados_ver_impuesto_1 != "") 
                  {
                      $this->ver_impuesto_1[] = $dados_ver_impuesto_1;
                  } 
              } 
              $this->ver_impuesto = ""; 
              foreach ($this->ver_impuesto_1 as $dados_ver_impuesto_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_impuesto .= ";";
                   } 
                   $this->ver_impuesto .= $dados_ver_impuesto_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_impuesto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_impuesto

    function ValidateField_ver_stock(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_stock == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_stock = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_stock))
          {
              $x = 0; 
              $this->ver_stock_1 = array(); 
              foreach ($this->ver_stock as $ind => $dados_ver_stock_1 ) 
              {
                  if ($dados_ver_stock_1 != "") 
                  {
                      $this->ver_stock_1[] = $dados_ver_stock_1;
                  } 
              } 
              $this->ver_stock = ""; 
              foreach ($this->ver_stock_1 as $dados_ver_stock_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_stock .= ";";
                   } 
                   $this->ver_stock .= $dados_ver_stock_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_stock';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_stock

    function ValidateField_ver_ubicacion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_ubicacion == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_ubicacion = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_ubicacion))
          {
              $x = 0; 
              $this->ver_ubicacion_1 = array(); 
              foreach ($this->ver_ubicacion as $ind => $dados_ver_ubicacion_1 ) 
              {
                  if ($dados_ver_ubicacion_1 != "") 
                  {
                      $this->ver_ubicacion_1[] = $dados_ver_ubicacion_1;
                  } 
              } 
              $this->ver_ubicacion = ""; 
              foreach ($this->ver_ubicacion_1 as $dados_ver_ubicacion_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_ubicacion .= ";";
                   } 
                   $this->ver_ubicacion .= $dados_ver_ubicacion_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_ubicacion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_ubicacion

    function ValidateField_ver_costo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_costo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_costo = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_costo))
          {
              $x = 0; 
              $this->ver_costo_1 = array(); 
              foreach ($this->ver_costo as $ind => $dados_ver_costo_1 ) 
              {
                  if ($dados_ver_costo_1 != "") 
                  {
                      $this->ver_costo_1[] = $dados_ver_costo_1;
                  } 
              } 
              $this->ver_costo = ""; 
              foreach ($this->ver_costo_1 as $dados_ver_costo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_costo .= ";";
                   } 
                   $this->ver_costo .= $dados_ver_costo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_costo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_costo

    function ValidateField_ver_proveedor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_proveedor == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_proveedor = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_proveedor))
          {
              $x = 0; 
              $this->ver_proveedor_1 = array(); 
              foreach ($this->ver_proveedor as $ind => $dados_ver_proveedor_1 ) 
              {
                  if ($dados_ver_proveedor_1 != "") 
                  {
                      $this->ver_proveedor_1[] = $dados_ver_proveedor_1;
                  } 
              } 
              $this->ver_proveedor = ""; 
              foreach ($this->ver_proveedor_1 as $dados_ver_proveedor_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_proveedor .= ";";
                   } 
                   $this->ver_proveedor .= $dados_ver_proveedor_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_proveedor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_proveedor

    function ValidateField_ver_combo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_combo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_combo = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_combo))
          {
              $x = 0; 
              $this->ver_combo_1 = array(); 
              foreach ($this->ver_combo as $ind => $dados_ver_combo_1 ) 
              {
                  if ($dados_ver_combo_1 != "") 
                  {
                      $this->ver_combo_1[] = $dados_ver_combo_1;
                  } 
              } 
              $this->ver_combo = ""; 
              foreach ($this->ver_combo_1 as $dados_ver_combo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_combo .= ";";
                   } 
                   $this->ver_combo .= $dados_ver_combo_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_combo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_combo

    function ValidateField_ver_agregar_nota(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->ver_agregar_nota == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->ver_agregar_nota = "NO";
      } 
      else 
      { 
          if (is_array($this->ver_agregar_nota))
          {
              $x = 0; 
              $this->ver_agregar_nota_1 = array(); 
              foreach ($this->ver_agregar_nota as $ind => $dados_ver_agregar_nota_1 ) 
              {
                  if ($dados_ver_agregar_nota_1 != "") 
                  {
                      $this->ver_agregar_nota_1[] = $dados_ver_agregar_nota_1;
                  } 
              } 
              $this->ver_agregar_nota = ""; 
              foreach ($this->ver_agregar_nota_1 as $dados_ver_agregar_nota_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->ver_agregar_nota .= ";";
                   } 
                   $this->ver_agregar_nota .= $dados_ver_agregar_nota_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ver_agregar_nota';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ver_agregar_nota

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['lineasporfactura'] = $this->lineasporfactura;
    $this->nmgp_dados_form['consolidararticulos'] = $this->consolidararticulos;
    $this->nmgp_dados_form['serial'] = $this->serial;
    $this->nmgp_dados_form['fecha'] = (strlen(trim($this->fecha)) > 19) ? str_replace(".", ":", $this->fecha) : trim($this->fecha);
    $this->nmgp_dados_form['activo'] = $this->activo;
    $this->nmgp_dados_form['espaciado'] = $this->espaciado;
    $this->nmgp_dados_form['minutos_inactividad'] = $this->minutos_inactividad;
    $this->nmgp_dados_form['caja_movil'] = $this->caja_movil;
    $this->nmgp_dados_form['pago_automatico'] = $this->pago_automatico;
    $this->nmgp_dados_form['dia_limite_pago'] = $this->dia_limite_pago;
    $this->nmgp_dados_form['refresh_grid_doc'] = $this->refresh_grid_doc;
    $this->nmgp_dados_form['desactivar_control_sesion'] = $this->desactivar_control_sesion;
    $this->nmgp_dados_form['nombre_pc'] = $this->nombre_pc;
    $this->nmgp_dados_form['nombre_impre'] = $this->nombre_impre;
    $this->nmgp_dados_form['essociedad'] = $this->essociedad;
    $this->nmgp_dados_form['grancontr'] = $this->grancontr;
    $this->nmgp_dados_form['idconfiguraciones'] = $this->idconfiguraciones;
    $this->nmgp_dados_form['control_diasmora'] = $this->control_diasmora;
    $this->nmgp_dados_form['control_costo'] = $this->control_costo;
    $this->nmgp_dados_form['modificainvpedido'] = $this->modificainvpedido;
    $this->nmgp_dados_form['tipodoc_pordefecto_pos'] = $this->tipodoc_pordefecto_pos;
    $this->nmgp_dados_form['ver_xml_fe'] = $this->ver_xml_fe;
    $this->nmgp_dados_form['noborrar_tmp_enpos'] = $this->noborrar_tmp_enpos;
    $this->nmgp_dados_form['validar_correo_enlinea'] = $this->validar_correo_enlinea;
    $this->nmgp_dados_form['apertura_caja'] = $this->apertura_caja;
    $this->nmgp_dados_form['activar_console_log'] = $this->activar_console_log;
    $this->nmgp_dados_form['codproducto_en_facventa'] = $this->codproducto_en_facventa;
    $this->nmgp_dados_form['valor_propina_sugerida'] = $this->valor_propina_sugerida;
    $this->nmgp_dados_form['columna_imprimir_ticket'] = $this->columna_imprimir_ticket;
    $this->nmgp_dados_form['columna_imprimir_a4'] = $this->columna_imprimir_a4;
    $this->nmgp_dados_form['columna_whatsapp'] = $this->columna_whatsapp;
    $this->nmgp_dados_form['columna_npedido'] = $this->columna_npedido;
    $this->nmgp_dados_form['columna_reg_pdf_propio'] = $this->columna_reg_pdf_propio;
    $this->nmgp_dados_form['ver_busqueda_refinada'] = $this->ver_busqueda_refinada;
    $this->nmgp_dados_form['cal_valores_decimales'] = $this->cal_valores_decimales;
    $this->nmgp_dados_form['cal_cantidades_decimales'] = $this->cal_cantidades_decimales;
    $this->nmgp_dados_form['validar_codbarras'] = $this->validar_codbarras;
    $this->nmgp_dados_form['ver_grupo'] = $this->ver_grupo;
    $this->nmgp_dados_form['ver_codigo'] = $this->ver_codigo;
    $this->nmgp_dados_form['ver_imagen'] = $this->ver_imagen;
    $this->nmgp_dados_form['ver_existencia'] = $this->ver_existencia;
    $this->nmgp_dados_form['ver_unidad'] = $this->ver_unidad;
    $this->nmgp_dados_form['ver_precio'] = $this->ver_precio;
    $this->nmgp_dados_form['ver_impuesto'] = $this->ver_impuesto;
    $this->nmgp_dados_form['ver_stock'] = $this->ver_stock;
    $this->nmgp_dados_form['ver_ubicacion'] = $this->ver_ubicacion;
    $this->nmgp_dados_form['ver_costo'] = $this->ver_costo;
    $this->nmgp_dados_form['ver_proveedor'] = $this->ver_proveedor;
    $this->nmgp_dados_form['ver_combo'] = $this->ver_combo;
    $this->nmgp_dados_form['ver_agregar_nota'] = $this->ver_agregar_nota;
    $this->nmgp_dados_form['ultima_edicion'] = $this->ultima_edicion;
    $this->nmgp_dados_form['ruta_bd_tns'] = $this->ruta_bd_tns;
    $this->nmgp_dados_form['ip'] = $this->ip;
    $this->nmgp_dados_form['integrar_tns'] = $this->integrar_tns;
    $this->nmgp_dados_form['nube_pedidos'] = $this->nube_pedidos;
    $this->nmgp_dados_form['nube_inventario'] = $this->nube_inventario;
    $this->nmgp_dados_form['nube_cartera'] = $this->nube_cartera;
    $this->nmgp_dados_form['nube_tesoreria'] = $this->nube_tesoreria;
    $this->nmgp_dados_form['nube_agenda'] = $this->nube_agenda;
    $this->nmgp_dados_form['nube_compras'] = $this->nube_compras;
    $this->nmgp_dados_form['nube_codigo'] = $this->nube_codigo;
    $this->nmgp_dados_form['token'] = $this->token;
    $this->nmgp_dados_form['password'] = $this->password;
    $this->nmgp_dados_form['habilitar_comprobantes'] = $this->habilitar_comprobantes;
    $this->nmgp_dados_form['licencia_activa'] = $this->licencia_activa;
    $this->nmgp_dados_form['fecha_activacion'] = $this->fecha_activacion;
    $this->nmgp_dados_form['cod_cliente'] = $this->cod_cliente;
    $this->nmgp_dados_form['probarnube'] = $this->probarnube;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['lineasporfactura'] = $this->lineasporfactura;
      $this->Before_unformat['lineasporfactura'] = $this->lineasporfactura;
      $this->nm_tira_mask($this->lineasporfactura, "99", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->lineasporfactura, $this->field_config['lineasporfactura']['symbol_grp']) ; 
      $this->Before_unformat['fecha'] = $this->fecha;
      nm_limpa_data($this->fecha, $this->field_config['fecha']['date_sep']) ; 
      $this->Before_unformat['espaciado'] = $this->espaciado;
      if (!empty($this->field_config['espaciado']['symbol_dec']))
      {
         nm_limpa_valor($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp']);
      }
      $this->Before_unformat['minutos_inactividad'] = $this->minutos_inactividad;
      nm_limpa_numero($this->minutos_inactividad, $this->field_config['minutos_inactividad']['symbol_grp']) ; 
      $this->Before_unformat['dia_limite_pago'] = $this->dia_limite_pago;
      nm_limpa_numero($this->dia_limite_pago, $this->field_config['dia_limite_pago']['symbol_grp']) ; 
      $this->Before_unformat['refresh_grid_doc'] = $this->refresh_grid_doc;
      nm_limpa_numero($this->refresh_grid_doc, $this->field_config['refresh_grid_doc']['symbol_grp']) ; 
      $this->Before_unformat['idconfiguraciones'] = $this->idconfiguraciones;
      nm_limpa_numero($this->idconfiguraciones, $this->field_config['idconfiguraciones']['symbol_grp']) ; 
      $this->Before_unformat['valor_propina_sugerida'] = $this->valor_propina_sugerida;
      if (!empty($this->field_config['valor_propina_sugerida']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valor_propina_sugerida, $this->field_config['valor_propina_sugerida']['symbol_dec'], $this->field_config['valor_propina_sugerida']['symbol_grp'], $this->field_config['valor_propina_sugerida']['symbol_mon']);
         nm_limpa_valor($this->valor_propina_sugerida, $this->field_config['valor_propina_sugerida']['symbol_dec'], $this->field_config['valor_propina_sugerida']['symbol_grp']);
      }
      $this->Before_unformat['cal_valores_decimales'] = $this->cal_valores_decimales;
      nm_limpa_numero($this->cal_valores_decimales, $this->field_config['cal_valores_decimales']['symbol_grp']) ; 
      $this->Before_unformat['cal_cantidades_decimales'] = $this->cal_cantidades_decimales;
      nm_limpa_numero($this->cal_cantidades_decimales, $this->field_config['cal_cantidades_decimales']['symbol_grp']) ; 
      $this->Before_unformat['ultima_edicion'] = $this->ultima_edicion;
      $this->Before_unformat['ultima_edicion_hora'] = $this->ultima_edicion_hora;
      nm_limpa_data($this->ultima_edicion, $this->field_config['ultima_edicion']['date_sep']) ; 
      nm_limpa_hora($this->ultima_edicion_hora, $this->field_config['ultima_edicion']['time_sep']) ; 
      $this->Before_unformat['password'] = $this->password;
      $this->nm_tira_mask($this->password, "************************************", "(){}[].,;:-+/ "); 
      $this->Before_unformat['fecha_activacion'] = $this->fecha_activacion;
      $this->Before_unformat['fecha_activacion_hora'] = $this->fecha_activacion_hora;
      nm_limpa_data($this->fecha_activacion, $this->field_config['fecha_activacion']['date_sep']) ; 
      nm_limpa_hora($this->fecha_activacion_hora, $this->field_config['fecha_activacion']['time_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "lineasporfactura")
      {
          $this->nm_tira_mask($this->lineasporfactura, "99", "(){}[].,;:-+/ "); 
          nm_limpa_numero($this->lineasporfactura, $this->field_config['lineasporfactura']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "espaciado")
      {
          if (!empty($this->field_config['espaciado']['symbol_dec']))
          {
             nm_limpa_valor($this->espaciado, $this->field_config['espaciado']['symbol_dec'], $this->field_config['espaciado']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "minutos_inactividad")
      {
          nm_limpa_numero($this->minutos_inactividad, $this->field_config['minutos_inactividad']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dia_limite_pago")
      {
          nm_limpa_numero($this->dia_limite_pago, $this->field_config['dia_limite_pago']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "refresh_grid_doc")
      {
          nm_limpa_numero($this->refresh_grid_doc, $this->field_config['refresh_grid_doc']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idconfiguraciones")
      {
          nm_limpa_numero($this->idconfiguraciones, $this->field_config['idconfiguraciones']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valor_propina_sugerida")
      {
          if (!empty($this->field_config['valor_propina_sugerida']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valor_propina_sugerida, $this->field_config['valor_propina_sugerida']['symbol_dec'], $this->field_config['valor_propina_sugerida']['symbol_grp'], $this->field_config['valor_propina_sugerida']['symbol_mon']);
             nm_limpa_valor($this->valor_propina_sugerida, $this->field_config['valor_propina_sugerida']['symbol_dec'], $this->field_config['valor_propina_sugerida']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "cal_valores_decimales")
      {
          nm_limpa_numero($this->cal_valores_decimales, $this->field_config['cal_valores_decimales']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cal_cantidades_decimales")
      {
          nm_limpa_numero($this->cal_cantidades_decimales, $this->field_config['cal_cantidades_decimales']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "password")
      {
          $this->nm_tira_mask($this->password, "************************************", "(){}[].,;:-+/ "); 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->lineasporfactura || (!empty($format_fields) && isset($format_fields['lineasporfactura'])))
      {
          $this->nm_gera_mask($this->lineasporfactura, "99"); 
      }
      if ((!empty($this->fecha) && 'null' != $this->fecha) || (!empty($format_fields) && isset($format_fields['fecha'])))
      {
          nm_volta_data($this->fecha, $this->field_config['fecha']['date_format']) ; 
          nmgp_Form_Datas($this->fecha, $this->field_config['fecha']['date_format'], $this->field_config['fecha']['date_sep']) ;  
      }
      elseif ('null' == $this->fecha || '' == $this->fecha)
      {
          $this->fecha = '';
      }
      if ('' !== $this->espaciado || (!empty($format_fields) && isset($format_fields['espaciado'])))
      {
          nmgp_Form_Num_Val($this->espaciado, $this->field_config['espaciado']['symbol_grp'], $this->field_config['espaciado']['symbol_dec'], "1", "S", $this->field_config['espaciado']['format_neg'], "", "", "-", $this->field_config['espaciado']['symbol_fmt']) ; 
      }
      if ('' !== $this->minutos_inactividad || (!empty($format_fields) && isset($format_fields['minutos_inactividad'])))
      {
          nmgp_Form_Num_Val($this->minutos_inactividad, $this->field_config['minutos_inactividad']['symbol_grp'], $this->field_config['minutos_inactividad']['symbol_dec'], "0", "S", $this->field_config['minutos_inactividad']['format_neg'], "", "", "-", $this->field_config['minutos_inactividad']['symbol_fmt']) ; 
      }
      if ('' !== $this->dia_limite_pago || (!empty($format_fields) && isset($format_fields['dia_limite_pago'])))
      {
          nmgp_Form_Num_Val($this->dia_limite_pago, $this->field_config['dia_limite_pago']['symbol_grp'], $this->field_config['dia_limite_pago']['symbol_dec'], "0", "S", $this->field_config['dia_limite_pago']['format_neg'], "", "", "-", $this->field_config['dia_limite_pago']['symbol_fmt']) ; 
      }
      if ('' !== $this->refresh_grid_doc || (!empty($format_fields) && isset($format_fields['refresh_grid_doc'])))
      {
          nmgp_Form_Num_Val($this->refresh_grid_doc, $this->field_config['refresh_grid_doc']['symbol_grp'], $this->field_config['refresh_grid_doc']['symbol_dec'], "0", "S", $this->field_config['refresh_grid_doc']['format_neg'], "", "", "-", $this->field_config['refresh_grid_doc']['symbol_fmt']) ; 
      }
      if ('' !== $this->idconfiguraciones || (!empty($format_fields) && isset($format_fields['idconfiguraciones'])))
      {
          nmgp_Form_Num_Val($this->idconfiguraciones, $this->field_config['idconfiguraciones']['symbol_grp'], $this->field_config['idconfiguraciones']['symbol_dec'], "0", "S", $this->field_config['idconfiguraciones']['format_neg'], "", "", "-", $this->field_config['idconfiguraciones']['symbol_fmt']) ; 
      }
      if ('' !== $this->valor_propina_sugerida || (!empty($format_fields) && isset($format_fields['valor_propina_sugerida'])))
      {
          nmgp_Form_Num_Val($this->valor_propina_sugerida, $this->field_config['valor_propina_sugerida']['symbol_grp'], $this->field_config['valor_propina_sugerida']['symbol_dec'], "0", "S", $this->field_config['valor_propina_sugerida']['format_neg'], "", "", "-", $this->field_config['valor_propina_sugerida']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valor_propina_sugerida']['symbol_mon'];
          $this->sc_add_currency($this->valor_propina_sugerida, $sMonSymb, $this->field_config['valor_propina_sugerida']['format_pos']); 
      }
      if ('' !== $this->cal_valores_decimales || (!empty($format_fields) && isset($format_fields['cal_valores_decimales'])))
      {
          nmgp_Form_Num_Val($this->cal_valores_decimales, $this->field_config['cal_valores_decimales']['symbol_grp'], $this->field_config['cal_valores_decimales']['symbol_dec'], "0", "S", $this->field_config['cal_valores_decimales']['format_neg'], "", "", "-", $this->field_config['cal_valores_decimales']['symbol_fmt']) ; 
      }
      if ('' !== $this->cal_cantidades_decimales || (!empty($format_fields) && isset($format_fields['cal_cantidades_decimales'])))
      {
          nmgp_Form_Num_Val($this->cal_cantidades_decimales, $this->field_config['cal_cantidades_decimales']['symbol_grp'], $this->field_config['cal_cantidades_decimales']['symbol_dec'], "0", "S", $this->field_config['cal_cantidades_decimales']['format_neg'], "", "", "-", $this->field_config['cal_cantidades_decimales']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
   function nm_validate_mask($value, $mask_list)
   {
       if ('' == $value)
       {
           return true;
       }

       $size_ok   = false;
       $test_mask = '';
       foreach ($mask_list as $tmp_mask)
       {
           if (mb_strlen($value) == strlen($tmp_mask))
           {
               $size_ok   = true;
               $test_mask = $tmp_mask;
           }
       }

       if (!$size_ok)
       {
           return false;
       }

       $i           = 0;
       $thisPointer = 0;
       while (false !== ($test_char = $this->nm_next_char($value, $thisPointer)))
       {
           if (!$this->nm_validate_mask_char($test_char, $test_mask[$i]))
           {
               return false;
           }
           $i++;
       }

       return true;
       for ($i = 0; $i < strlen($value); $i++)
       {
           if (!$this->nm_validate_mask_char($value[$i], $test_mask[$i]))
           {
               return false;
           }
       }

       return true;
   }

   function nm_validate_mask_char($value_char, $mask_char)
   {
       switch ($mask_char)
       {
           case '9':
               return false !== strpos('0123456789', $value_char);
               break;

           case 'a':
               return false !== strpos('abcdefghijklmnopqrstuvwxyz', strtolower($value_char));
               break;

           case '*':
               if (false !== strpos('abcdefghijklmnopqrstuvwxyz0123456789', strtolower($value_char))) {
                   return true;
               }
               if (preg_match("/\p{Arabic}/u", $value_char)) {
                   return true;
               }

               return false;
               break;

           default:
               return $value_char == $mask_char;
               break;
       }
   }

   function nm_next_char($string, &$pointer) {
       if (!isset($string[$pointer])) {
           return false;
       }

       $char = ord($string[$pointer]);

       if ($char < 128) {
           return $string[$pointer++];
       }
       else {
           if ($char < 224) {
               $bytes = 2;
           }
           elseif ($char < 240) {
               $bytes = 3;
           }
           elseif ($char < 248) {
               $bytes = 4;
           }
           elseif($char == 252) {
               $bytes = 5;
           }
           else {
               $bytes = 6;
           }

           $str      = substr($string, $pointer, $bytes);
           $pointer += $bytes;

           return $str;
       }
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['fecha']['date_format'];
      if ($this->fecha != "")  
      { 
          nm_conv_data($this->fecha, $this->field_config['fecha']['date_format']) ; 
          $this->fecha_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fecha_hora = substr($this->fecha_hora, 0, -4);
          }
      } 
      if ($this->fecha == "" && $use_null)  
      { 
          $this->fecha = "null" ; 
      } 
      $this->field_config['fecha']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_lineasporfactura();
          $this->ajax_return_values_consolidararticulos();
          $this->ajax_return_values_serial();
          $this->ajax_return_values_fecha();
          $this->ajax_return_values_activo();
          $this->ajax_return_values_espaciado();
          $this->ajax_return_values_minutos_inactividad();
          $this->ajax_return_values_caja_movil();
          $this->ajax_return_values_pago_automatico();
          $this->ajax_return_values_dia_limite_pago();
          $this->ajax_return_values_refresh_grid_doc();
          $this->ajax_return_values_desactivar_control_sesion();
          $this->ajax_return_values_nombre_pc();
          $this->ajax_return_values_nombre_impre();
          $this->ajax_return_values_essociedad();
          $this->ajax_return_values_grancontr();
          $this->ajax_return_values_idconfiguraciones();
          $this->ajax_return_values_control_diasmora();
          $this->ajax_return_values_control_costo();
          $this->ajax_return_values_modificainvpedido();
          $this->ajax_return_values_tipodoc_pordefecto_pos();
          $this->ajax_return_values_ver_xml_fe();
          $this->ajax_return_values_noborrar_tmp_enpos();
          $this->ajax_return_values_validar_correo_enlinea();
          $this->ajax_return_values_apertura_caja();
          $this->ajax_return_values_activar_console_log();
          $this->ajax_return_values_codproducto_en_facventa();
          $this->ajax_return_values_valor_propina_sugerida();
          $this->ajax_return_values_columna_imprimir_ticket();
          $this->ajax_return_values_columna_imprimir_a4();
          $this->ajax_return_values_columna_whatsapp();
          $this->ajax_return_values_columna_npedido();
          $this->ajax_return_values_columna_reg_pdf_propio();
          $this->ajax_return_values_ver_busqueda_refinada();
          $this->ajax_return_values_cal_valores_decimales();
          $this->ajax_return_values_cal_cantidades_decimales();
          $this->ajax_return_values_validar_codbarras();
          $this->ajax_return_values_ver_grupo();
          $this->ajax_return_values_ver_codigo();
          $this->ajax_return_values_ver_imagen();
          $this->ajax_return_values_ver_existencia();
          $this->ajax_return_values_ver_unidad();
          $this->ajax_return_values_ver_precio();
          $this->ajax_return_values_ver_impuesto();
          $this->ajax_return_values_ver_stock();
          $this->ajax_return_values_ver_ubicacion();
          $this->ajax_return_values_ver_costo();
          $this->ajax_return_values_ver_proveedor();
          $this->ajax_return_values_ver_combo();
          $this->ajax_return_values_ver_agregar_nota();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idconfiguraciones']['keyVal'] = form_configuraciones_pack_protect_string($this->nmgp_dados_form['idconfiguraciones']);
          }
   } // ajax_return_values

          //----- lineasporfactura
   function ajax_return_values_lineasporfactura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lineasporfactura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lineasporfactura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lineasporfactura'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- consolidararticulos
   function ajax_return_values_consolidararticulos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("consolidararticulos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->consolidararticulos);
              $aLookup = array();
              $this->_tmp_lookup_consolidararticulos = $this->consolidararticulos;

$aLookup[] = array(form_configuraciones_pack_protect_string('S') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("S")));
$aLookup[] = array(form_configuraciones_pack_protect_string('N') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("N")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_consolidararticulos'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_consolidararticulos'][] = 'N';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"consolidararticulos\"";
          if (isset($this->NM_ajax_info['select_html']['consolidararticulos']) && !empty($this->NM_ajax_info['select_html']['consolidararticulos']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['consolidararticulos']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->consolidararticulos == $sValue)
                  {
                      $this->_tmp_lookup_consolidararticulos = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['consolidararticulos'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['consolidararticulos']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['consolidararticulos']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['consolidararticulos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['consolidararticulos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['consolidararticulos']['labList'] = $aLabel;
          }
   }

          //----- serial
   function ajax_return_values_serial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("serial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->serial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['serial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- fecha
   function ajax_return_values_fecha($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fecha", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->fecha);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['fecha'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- activo
   function ajax_return_values_activo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("activo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->activo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['activo'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- espaciado
   function ajax_return_values_espaciado($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("espaciado", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->espaciado);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['espaciado'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- minutos_inactividad
   function ajax_return_values_minutos_inactividad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("minutos_inactividad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->minutos_inactividad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['minutos_inactividad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- caja_movil
   function ajax_return_values_caja_movil($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("caja_movil", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->caja_movil);
              $aLookup = array();
              $this->_tmp_lookup_caja_movil = $this->caja_movil;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_caja_movil'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['caja_movil']) && !empty($this->NM_ajax_info['select_html']['caja_movil']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['caja_movil']);
          }
          $this->NM_ajax_info['fldList']['caja_movil'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-caja_movil',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['caja_movil']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['caja_movil']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['caja_movil']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['caja_movil']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['caja_movil']['labList'] = $aLabel;
          }
   }

          //----- pago_automatico
   function ajax_return_values_pago_automatico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pago_automatico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pago_automatico);
              $aLookup = array();
              $this->_tmp_lookup_pago_automatico = $this->pago_automatico;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_pago_automatico'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['pago_automatico']) && !empty($this->NM_ajax_info['select_html']['pago_automatico']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['pago_automatico']);
          }
          $this->NM_ajax_info['fldList']['pago_automatico'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-pago_automatico',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pago_automatico']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pago_automatico']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pago_automatico']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pago_automatico']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pago_automatico']['labList'] = $aLabel;
          }
   }

          //----- dia_limite_pago
   function ajax_return_values_dia_limite_pago($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("dia_limite_pago", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->dia_limite_pago);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['dia_limite_pago'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- refresh_grid_doc
   function ajax_return_values_refresh_grid_doc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("refresh_grid_doc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->refresh_grid_doc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['refresh_grid_doc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- desactivar_control_sesion
   function ajax_return_values_desactivar_control_sesion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("desactivar_control_sesion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->desactivar_control_sesion);
              $aLookup = array();
              $this->_tmp_lookup_desactivar_control_sesion = $this->desactivar_control_sesion;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_desactivar_control_sesion'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['desactivar_control_sesion']) && !empty($this->NM_ajax_info['select_html']['desactivar_control_sesion']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['desactivar_control_sesion']);
          }
          $this->NM_ajax_info['fldList']['desactivar_control_sesion'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-desactivar_control_sesion',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['desactivar_control_sesion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['desactivar_control_sesion']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['desactivar_control_sesion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['desactivar_control_sesion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['desactivar_control_sesion']['labList'] = $aLabel;
          }
   }

          //----- nombre_pc
   function ajax_return_values_nombre_pc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_pc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_pc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_pc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nombre_impre
   function ajax_return_values_nombre_impre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_impre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_impre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_impre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- essociedad
   function ajax_return_values_essociedad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("essociedad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->essociedad);
              $aLookup = array();
              $this->_tmp_lookup_essociedad = $this->essociedad;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_essociedad'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['essociedad']) && !empty($this->NM_ajax_info['select_html']['essociedad']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['essociedad']);
          }
          $this->NM_ajax_info['fldList']['essociedad'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-essociedad',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['essociedad']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['essociedad']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['essociedad']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['essociedad']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['essociedad']['labList'] = $aLabel;
          }
   }

          //----- grancontr
   function ajax_return_values_grancontr($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("grancontr", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->grancontr);
              $aLookup = array();
              $this->_tmp_lookup_grancontr = $this->grancontr;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_grancontr'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['grancontr']) && !empty($this->NM_ajax_info['select_html']['grancontr']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['grancontr']);
          }
          $this->NM_ajax_info['fldList']['grancontr'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-grancontr',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['grancontr']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['grancontr']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['grancontr']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['grancontr']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['grancontr']['labList'] = $aLabel;
          }
   }

          //----- idconfiguraciones
   function ajax_return_values_idconfiguraciones($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idconfiguraciones", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idconfiguraciones);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idconfiguraciones'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("idconfiguraciones", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- control_diasmora
   function ajax_return_values_control_diasmora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("control_diasmora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->control_diasmora);
              $aLookup = array();
              $this->_tmp_lookup_control_diasmora = $this->control_diasmora;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_control_diasmora'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['control_diasmora']) && !empty($this->NM_ajax_info['select_html']['control_diasmora']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['control_diasmora']);
          }
          $this->NM_ajax_info['fldList']['control_diasmora'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-control_diasmora',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['control_diasmora']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['control_diasmora']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['control_diasmora']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['control_diasmora']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['control_diasmora']['labList'] = $aLabel;
          }
   }

          //----- control_costo
   function ajax_return_values_control_costo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("control_costo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->control_costo);
              $aLookup = array();
              $this->_tmp_lookup_control_costo = $this->control_costo;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_control_costo'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['control_costo']) && !empty($this->NM_ajax_info['select_html']['control_costo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['control_costo']);
          }
          $this->NM_ajax_info['fldList']['control_costo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-control_costo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['control_costo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['control_costo']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['control_costo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['control_costo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['control_costo']['labList'] = $aLabel;
          }
   }

          //----- modificainvpedido
   function ajax_return_values_modificainvpedido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("modificainvpedido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->modificainvpedido);
              $aLookup = array();
              $this->_tmp_lookup_modificainvpedido = $this->modificainvpedido;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_modificainvpedido'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['modificainvpedido']) && !empty($this->NM_ajax_info['select_html']['modificainvpedido']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['modificainvpedido']);
          }
          $this->NM_ajax_info['fldList']['modificainvpedido'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-modificainvpedido',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['modificainvpedido']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['modificainvpedido']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['modificainvpedido']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['modificainvpedido']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['modificainvpedido']['labList'] = $aLabel;
          }
   }

          //----- tipodoc_pordefecto_pos
   function ajax_return_values_tipodoc_pordefecto_pos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipodoc_pordefecto_pos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipodoc_pordefecto_pos);
              $aLookup = array();
              $this->_tmp_lookup_tipodoc_pordefecto_pos = $this->tipodoc_pordefecto_pos;

$aLookup[] = array(form_configuraciones_pack_protect_string('FV') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("FACTURA")));
$aLookup[] = array(form_configuraciones_pack_protect_string('RS') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("REMISIÓN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_tipodoc_pordefecto_pos'][] = 'FV';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_tipodoc_pordefecto_pos'][] = 'RS';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipodoc_pordefecto_pos\"";
          if (isset($this->NM_ajax_info['select_html']['tipodoc_pordefecto_pos']) && !empty($this->NM_ajax_info['select_html']['tipodoc_pordefecto_pos']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tipodoc_pordefecto_pos']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->tipodoc_pordefecto_pos == $sValue)
                  {
                      $this->_tmp_lookup_tipodoc_pordefecto_pos = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipodoc_pordefecto_pos'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipodoc_pordefecto_pos']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipodoc_pordefecto_pos']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipodoc_pordefecto_pos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipodoc_pordefecto_pos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipodoc_pordefecto_pos']['labList'] = $aLabel;
          }
   }

          //----- ver_xml_fe
   function ajax_return_values_ver_xml_fe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_xml_fe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_xml_fe);
              $aLookup = array();
              $this->_tmp_lookup_ver_xml_fe = $this->ver_xml_fe;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_xml_fe'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_xml_fe']) && !empty($this->NM_ajax_info['select_html']['ver_xml_fe']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_xml_fe']);
          }
          $this->NM_ajax_info['fldList']['ver_xml_fe'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_xml_fe',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_xml_fe']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_xml_fe']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_xml_fe']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_xml_fe']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_xml_fe']['labList'] = $aLabel;
          }
   }

          //----- noborrar_tmp_enpos
   function ajax_return_values_noborrar_tmp_enpos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("noborrar_tmp_enpos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->noborrar_tmp_enpos);
              $aLookup = array();
              $this->_tmp_lookup_noborrar_tmp_enpos = $this->noborrar_tmp_enpos;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_noborrar_tmp_enpos'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['noborrar_tmp_enpos']) && !empty($this->NM_ajax_info['select_html']['noborrar_tmp_enpos']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['noborrar_tmp_enpos']);
          }
          $this->NM_ajax_info['fldList']['noborrar_tmp_enpos'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-noborrar_tmp_enpos',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['noborrar_tmp_enpos']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['noborrar_tmp_enpos']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['noborrar_tmp_enpos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['noborrar_tmp_enpos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['noborrar_tmp_enpos']['labList'] = $aLabel;
          }
   }

          //----- validar_correo_enlinea
   function ajax_return_values_validar_correo_enlinea($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("validar_correo_enlinea", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->validar_correo_enlinea);
              $aLookup = array();
              $this->_tmp_lookup_validar_correo_enlinea = $this->validar_correo_enlinea;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_validar_correo_enlinea'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['validar_correo_enlinea']) && !empty($this->NM_ajax_info['select_html']['validar_correo_enlinea']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['validar_correo_enlinea']);
          }
          $this->NM_ajax_info['fldList']['validar_correo_enlinea'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-validar_correo_enlinea',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['validar_correo_enlinea']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['validar_correo_enlinea']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['validar_correo_enlinea']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['validar_correo_enlinea']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['validar_correo_enlinea']['labList'] = $aLabel;
          }
   }

          //----- apertura_caja
   function ajax_return_values_apertura_caja($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apertura_caja", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->apertura_caja);
              $aLookup = array();
              $this->_tmp_lookup_apertura_caja = $this->apertura_caja;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_apertura_caja'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['apertura_caja']) && !empty($this->NM_ajax_info['select_html']['apertura_caja']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['apertura_caja']);
          }
          $this->NM_ajax_info['fldList']['apertura_caja'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-apertura_caja',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['apertura_caja']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['apertura_caja']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['apertura_caja']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['apertura_caja']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['apertura_caja']['labList'] = $aLabel;
          }
   }

          //----- activar_console_log
   function ajax_return_values_activar_console_log($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("activar_console_log", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->activar_console_log);
              $aLookup = array();
              $this->_tmp_lookup_activar_console_log = $this->activar_console_log;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_activar_console_log'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['activar_console_log']) && !empty($this->NM_ajax_info['select_html']['activar_console_log']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['activar_console_log']);
          }
          $this->NM_ajax_info['fldList']['activar_console_log'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-activar_console_log',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['activar_console_log']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['activar_console_log']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['activar_console_log']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['activar_console_log']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['activar_console_log']['labList'] = $aLabel;
          }
   }

          //----- codproducto_en_facventa
   function ajax_return_values_codproducto_en_facventa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codproducto_en_facventa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codproducto_en_facventa);
              $aLookup = array();
              $this->_tmp_lookup_codproducto_en_facventa = $this->codproducto_en_facventa;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_codproducto_en_facventa'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['codproducto_en_facventa']) && !empty($this->NM_ajax_info['select_html']['codproducto_en_facventa']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['codproducto_en_facventa']);
          }
          $this->NM_ajax_info['fldList']['codproducto_en_facventa'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => false,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-codproducto_en_facventa',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['codproducto_en_facventa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['codproducto_en_facventa']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['codproducto_en_facventa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['codproducto_en_facventa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['codproducto_en_facventa']['labList'] = $aLabel;
          }
   }

          //----- valor_propina_sugerida
   function ajax_return_values_valor_propina_sugerida($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valor_propina_sugerida", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valor_propina_sugerida);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valor_propina_sugerida'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- columna_imprimir_ticket
   function ajax_return_values_columna_imprimir_ticket($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("columna_imprimir_ticket", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->columna_imprimir_ticket);
              $aLookup = array();
              $this->_tmp_lookup_columna_imprimir_ticket = $this->columna_imprimir_ticket;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_columna_imprimir_ticket'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['columna_imprimir_ticket']) && !empty($this->NM_ajax_info['select_html']['columna_imprimir_ticket']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['columna_imprimir_ticket']);
          }
          $this->NM_ajax_info['fldList']['columna_imprimir_ticket'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-columna_imprimir_ticket',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['columna_imprimir_ticket']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['columna_imprimir_ticket']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['columna_imprimir_ticket']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['columna_imprimir_ticket']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['columna_imprimir_ticket']['labList'] = $aLabel;
          }
   }

          //----- columna_imprimir_a4
   function ajax_return_values_columna_imprimir_a4($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("columna_imprimir_a4", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->columna_imprimir_a4);
              $aLookup = array();
              $this->_tmp_lookup_columna_imprimir_a4 = $this->columna_imprimir_a4;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_columna_imprimir_a4'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['columna_imprimir_a4']) && !empty($this->NM_ajax_info['select_html']['columna_imprimir_a4']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['columna_imprimir_a4']);
          }
          $this->NM_ajax_info['fldList']['columna_imprimir_a4'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-columna_imprimir_a4',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['columna_imprimir_a4']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['columna_imprimir_a4']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['columna_imprimir_a4']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['columna_imprimir_a4']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['columna_imprimir_a4']['labList'] = $aLabel;
          }
   }

          //----- columna_whatsapp
   function ajax_return_values_columna_whatsapp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("columna_whatsapp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->columna_whatsapp);
              $aLookup = array();
              $this->_tmp_lookup_columna_whatsapp = $this->columna_whatsapp;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_columna_whatsapp'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['columna_whatsapp']) && !empty($this->NM_ajax_info['select_html']['columna_whatsapp']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['columna_whatsapp']);
          }
          $this->NM_ajax_info['fldList']['columna_whatsapp'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-columna_whatsapp',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['columna_whatsapp']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['columna_whatsapp']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['columna_whatsapp']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['columna_whatsapp']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['columna_whatsapp']['labList'] = $aLabel;
          }
   }

          //----- columna_npedido
   function ajax_return_values_columna_npedido($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("columna_npedido", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->columna_npedido);
              $aLookup = array();
              $this->_tmp_lookup_columna_npedido = $this->columna_npedido;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_columna_npedido'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['columna_npedido']) && !empty($this->NM_ajax_info['select_html']['columna_npedido']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['columna_npedido']);
          }
          $this->NM_ajax_info['fldList']['columna_npedido'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-columna_npedido',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['columna_npedido']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['columna_npedido']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['columna_npedido']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['columna_npedido']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['columna_npedido']['labList'] = $aLabel;
          }
   }

          //----- columna_reg_pdf_propio
   function ajax_return_values_columna_reg_pdf_propio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("columna_reg_pdf_propio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->columna_reg_pdf_propio);
              $aLookup = array();
              $this->_tmp_lookup_columna_reg_pdf_propio = $this->columna_reg_pdf_propio;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_columna_reg_pdf_propio'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['columna_reg_pdf_propio']) && !empty($this->NM_ajax_info['select_html']['columna_reg_pdf_propio']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['columna_reg_pdf_propio']);
          }
          $this->NM_ajax_info['fldList']['columna_reg_pdf_propio'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-columna_reg_pdf_propio',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['columna_reg_pdf_propio']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['columna_reg_pdf_propio']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['columna_reg_pdf_propio']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['columna_reg_pdf_propio']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['columna_reg_pdf_propio']['labList'] = $aLabel;
          }
   }

          //----- ver_busqueda_refinada
   function ajax_return_values_ver_busqueda_refinada($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_busqueda_refinada", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_busqueda_refinada);
              $aLookup = array();
              $this->_tmp_lookup_ver_busqueda_refinada = $this->ver_busqueda_refinada;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_busqueda_refinada'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_busqueda_refinada']) && !empty($this->NM_ajax_info['select_html']['ver_busqueda_refinada']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_busqueda_refinada']);
          }
          $this->NM_ajax_info['fldList']['ver_busqueda_refinada'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_busqueda_refinada',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_busqueda_refinada']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_busqueda_refinada']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_busqueda_refinada']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_busqueda_refinada']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_busqueda_refinada']['labList'] = $aLabel;
          }
   }

          //----- cal_valores_decimales
   function ajax_return_values_cal_valores_decimales($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cal_valores_decimales", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cal_valores_decimales);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cal_valores_decimales'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- cal_cantidades_decimales
   function ajax_return_values_cal_cantidades_decimales($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cal_cantidades_decimales", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cal_cantidades_decimales);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cal_cantidades_decimales'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- validar_codbarras
   function ajax_return_values_validar_codbarras($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("validar_codbarras", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->validar_codbarras);
              $aLookup = array();
              $this->_tmp_lookup_validar_codbarras = $this->validar_codbarras;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_validar_codbarras'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['validar_codbarras']) && !empty($this->NM_ajax_info['select_html']['validar_codbarras']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['validar_codbarras']);
          }
          $this->NM_ajax_info['fldList']['validar_codbarras'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-validar_codbarras',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['validar_codbarras']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['validar_codbarras']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['validar_codbarras']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['validar_codbarras']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['validar_codbarras']['labList'] = $aLabel;
          }
   }

          //----- ver_grupo
   function ajax_return_values_ver_grupo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_grupo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_grupo);
              $aLookup = array();
              $this->_tmp_lookup_ver_grupo = $this->ver_grupo;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_grupo'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_grupo']) && !empty($this->NM_ajax_info['select_html']['ver_grupo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_grupo']);
          }
          $this->NM_ajax_info['fldList']['ver_grupo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_grupo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_grupo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_grupo']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_grupo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_grupo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_grupo']['labList'] = $aLabel;
          }
   }

          //----- ver_codigo
   function ajax_return_values_ver_codigo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_codigo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_codigo);
              $aLookup = array();
              $this->_tmp_lookup_ver_codigo = $this->ver_codigo;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_codigo'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_codigo']) && !empty($this->NM_ajax_info['select_html']['ver_codigo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_codigo']);
          }
          $this->NM_ajax_info['fldList']['ver_codigo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_codigo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_codigo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_codigo']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_codigo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_codigo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_codigo']['labList'] = $aLabel;
          }
   }

          //----- ver_imagen
   function ajax_return_values_ver_imagen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_imagen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_imagen);
              $aLookup = array();
              $this->_tmp_lookup_ver_imagen = $this->ver_imagen;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_imagen'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_imagen']) && !empty($this->NM_ajax_info['select_html']['ver_imagen']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_imagen']);
          }
          $this->NM_ajax_info['fldList']['ver_imagen'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_imagen',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_imagen']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_imagen']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_imagen']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_imagen']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_imagen']['labList'] = $aLabel;
          }
   }

          //----- ver_existencia
   function ajax_return_values_ver_existencia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_existencia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_existencia);
              $aLookup = array();
              $this->_tmp_lookup_ver_existencia = $this->ver_existencia;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_existencia'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_existencia']) && !empty($this->NM_ajax_info['select_html']['ver_existencia']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_existencia']);
          }
          $this->NM_ajax_info['fldList']['ver_existencia'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_existencia',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_existencia']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_existencia']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_existencia']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_existencia']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_existencia']['labList'] = $aLabel;
          }
   }

          //----- ver_unidad
   function ajax_return_values_ver_unidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_unidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_unidad);
              $aLookup = array();
              $this->_tmp_lookup_ver_unidad = $this->ver_unidad;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_unidad'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_unidad']) && !empty($this->NM_ajax_info['select_html']['ver_unidad']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_unidad']);
          }
          $this->NM_ajax_info['fldList']['ver_unidad'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_unidad',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_unidad']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_unidad']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_unidad']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_unidad']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_unidad']['labList'] = $aLabel;
          }
   }

          //----- ver_precio
   function ajax_return_values_ver_precio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_precio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_precio);
              $aLookup = array();
              $this->_tmp_lookup_ver_precio = $this->ver_precio;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_precio'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_precio']) && !empty($this->NM_ajax_info['select_html']['ver_precio']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_precio']);
          }
          $this->NM_ajax_info['fldList']['ver_precio'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_precio',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_precio']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_precio']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_precio']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_precio']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_precio']['labList'] = $aLabel;
          }
   }

          //----- ver_impuesto
   function ajax_return_values_ver_impuesto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_impuesto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_impuesto);
              $aLookup = array();
              $this->_tmp_lookup_ver_impuesto = $this->ver_impuesto;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_impuesto'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_impuesto']) && !empty($this->NM_ajax_info['select_html']['ver_impuesto']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_impuesto']);
          }
          $this->NM_ajax_info['fldList']['ver_impuesto'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_impuesto',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_impuesto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_impuesto']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_impuesto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_impuesto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_impuesto']['labList'] = $aLabel;
          }
   }

          //----- ver_stock
   function ajax_return_values_ver_stock($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_stock", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_stock);
              $aLookup = array();
              $this->_tmp_lookup_ver_stock = $this->ver_stock;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_stock'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_stock']) && !empty($this->NM_ajax_info['select_html']['ver_stock']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_stock']);
          }
          $this->NM_ajax_info['fldList']['ver_stock'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_stock',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_stock']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_stock']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_stock']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_stock']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_stock']['labList'] = $aLabel;
          }
   }

          //----- ver_ubicacion
   function ajax_return_values_ver_ubicacion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_ubicacion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_ubicacion);
              $aLookup = array();
              $this->_tmp_lookup_ver_ubicacion = $this->ver_ubicacion;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_ubicacion'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_ubicacion']) && !empty($this->NM_ajax_info['select_html']['ver_ubicacion']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_ubicacion']);
          }
          $this->NM_ajax_info['fldList']['ver_ubicacion'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_ubicacion',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_ubicacion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_ubicacion']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_ubicacion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_ubicacion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_ubicacion']['labList'] = $aLabel;
          }
   }

          //----- ver_costo
   function ajax_return_values_ver_costo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_costo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_costo);
              $aLookup = array();
              $this->_tmp_lookup_ver_costo = $this->ver_costo;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_costo'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_costo']) && !empty($this->NM_ajax_info['select_html']['ver_costo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_costo']);
          }
          $this->NM_ajax_info['fldList']['ver_costo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_costo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_costo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_costo']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_costo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_costo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_costo']['labList'] = $aLabel;
          }
   }

          //----- ver_proveedor
   function ajax_return_values_ver_proveedor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_proveedor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_proveedor);
              $aLookup = array();
              $this->_tmp_lookup_ver_proveedor = $this->ver_proveedor;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_proveedor'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_proveedor']) && !empty($this->NM_ajax_info['select_html']['ver_proveedor']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_proveedor']);
          }
          $this->NM_ajax_info['fldList']['ver_proveedor'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_proveedor',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_proveedor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_proveedor']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_proveedor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_proveedor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_proveedor']['labList'] = $aLabel;
          }
   }

          //----- ver_combo
   function ajax_return_values_ver_combo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_combo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_combo);
              $aLookup = array();
              $this->_tmp_lookup_ver_combo = $this->ver_combo;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_combo'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_combo']) && !empty($this->NM_ajax_info['select_html']['ver_combo']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_combo']);
          }
          $this->NM_ajax_info['fldList']['ver_combo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_combo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_combo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_combo']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_combo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_combo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_combo']['labList'] = $aLabel;
          }
   }

          //----- ver_agregar_nota
   function ajax_return_values_ver_agregar_nota($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ver_agregar_nota", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ver_agregar_nota);
              $aLookup = array();
              $this->_tmp_lookup_ver_agregar_nota = $this->ver_agregar_nota;

$aLookup[] = array(form_configuraciones_pack_protect_string('SI') => str_replace('<', '&lt;',form_configuraciones_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['Lookup_ver_agregar_nota'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['ver_agregar_nota']) && !empty($this->NM_ajax_info['select_html']['ver_agregar_nota']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['ver_agregar_nota']);
          }
          $this->NM_ajax_info['fldList']['ver_agregar_nota'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-ver_agregar_nota',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['ver_agregar_nota']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['ver_agregar_nota']['valList'][$i] = form_configuraciones_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['ver_agregar_nota']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['ver_agregar_nota']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['ver_agregar_nota']['labList'] = $aLabel;
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_apertura_caja = $this->apertura_caja;
}
if (!isset($this->sc_temp_gapertura_caja)) {$this->sc_temp_gapertura_caja = (isset($_SESSION['gapertura_caja'])) ? $_SESSION['gapertura_caja'] : "";}
  $this->sc_temp_gapertura_caja = $this->apertura_caja ;

if (isset($this->sc_temp_gapertura_caja)) { $_SESSION['gapertura_caja'] = $this->sc_temp_gapertura_caja;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_apertura_caja != $this->apertura_caja || (isset($bFlagRead_apertura_caja) && $bFlagRead_apertura_caja)))
    {
        $this->ajax_return_values_apertura_caja(true);
    }
}
$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off'; 
      }
      if (empty($this->ultima_edicion))
      {
          $this->ultima_edicion_hora = $this->ultima_edicion;
      }
      if (empty($this->fecha_activacion))
      {
          $this->fecha_activacion_hora = $this->fecha_activacion;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->espaciado = str_replace($sc_parm1, $sc_parm2, $this->espaciado); 
      $this->valor_propina_sugerida = str_replace($sc_parm1, $sc_parm2, $this->valor_propina_sugerida); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->espaciado = "'" . $this->espaciado . "'";
      $this->valor_propina_sugerida = "'" . $this->valor_propina_sugerida . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->espaciado = str_replace("'", "", $this->espaciado); 
      $this->valor_propina_sugerida = str_replace("'", "", $this->valor_propina_sugerida); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['lineasporfactura'] = $this->lineasporfactura;
      $NM_val_form['consolidararticulos'] = $this->consolidararticulos;
      $NM_val_form['serial'] = $this->serial;
      $NM_val_form['fecha'] = $this->fecha;
      $NM_val_form['activo'] = $this->activo;
      $NM_val_form['espaciado'] = $this->espaciado;
      $NM_val_form['minutos_inactividad'] = $this->minutos_inactividad;
      $NM_val_form['caja_movil'] = $this->caja_movil;
      $NM_val_form['pago_automatico'] = $this->pago_automatico;
      $NM_val_form['dia_limite_pago'] = $this->dia_limite_pago;
      $NM_val_form['refresh_grid_doc'] = $this->refresh_grid_doc;
      $NM_val_form['desactivar_control_sesion'] = $this->desactivar_control_sesion;
      $NM_val_form['nombre_pc'] = $this->nombre_pc;
      $NM_val_form['nombre_impre'] = $this->nombre_impre;
      $NM_val_form['essociedad'] = $this->essociedad;
      $NM_val_form['grancontr'] = $this->grancontr;
      $NM_val_form['idconfiguraciones'] = $this->idconfiguraciones;
      $NM_val_form['control_diasmora'] = $this->control_diasmora;
      $NM_val_form['control_costo'] = $this->control_costo;
      $NM_val_form['modificainvpedido'] = $this->modificainvpedido;
      $NM_val_form['tipodoc_pordefecto_pos'] = $this->tipodoc_pordefecto_pos;
      $NM_val_form['ver_xml_fe'] = $this->ver_xml_fe;
      $NM_val_form['noborrar_tmp_enpos'] = $this->noborrar_tmp_enpos;
      $NM_val_form['validar_correo_enlinea'] = $this->validar_correo_enlinea;
      $NM_val_form['apertura_caja'] = $this->apertura_caja;
      $NM_val_form['activar_console_log'] = $this->activar_console_log;
      $NM_val_form['codproducto_en_facventa'] = $this->codproducto_en_facventa;
      $NM_val_form['valor_propina_sugerida'] = $this->valor_propina_sugerida;
      $NM_val_form['columna_imprimir_ticket'] = $this->columna_imprimir_ticket;
      $NM_val_form['columna_imprimir_a4'] = $this->columna_imprimir_a4;
      $NM_val_form['columna_whatsapp'] = $this->columna_whatsapp;
      $NM_val_form['columna_npedido'] = $this->columna_npedido;
      $NM_val_form['columna_reg_pdf_propio'] = $this->columna_reg_pdf_propio;
      $NM_val_form['ver_busqueda_refinada'] = $this->ver_busqueda_refinada;
      $NM_val_form['cal_valores_decimales'] = $this->cal_valores_decimales;
      $NM_val_form['cal_cantidades_decimales'] = $this->cal_cantidades_decimales;
      $NM_val_form['validar_codbarras'] = $this->validar_codbarras;
      $NM_val_form['ver_grupo'] = $this->ver_grupo;
      $NM_val_form['ver_codigo'] = $this->ver_codigo;
      $NM_val_form['ver_imagen'] = $this->ver_imagen;
      $NM_val_form['ver_existencia'] = $this->ver_existencia;
      $NM_val_form['ver_unidad'] = $this->ver_unidad;
      $NM_val_form['ver_precio'] = $this->ver_precio;
      $NM_val_form['ver_impuesto'] = $this->ver_impuesto;
      $NM_val_form['ver_stock'] = $this->ver_stock;
      $NM_val_form['ver_ubicacion'] = $this->ver_ubicacion;
      $NM_val_form['ver_costo'] = $this->ver_costo;
      $NM_val_form['ver_proveedor'] = $this->ver_proveedor;
      $NM_val_form['ver_combo'] = $this->ver_combo;
      $NM_val_form['ver_agregar_nota'] = $this->ver_agregar_nota;
      $NM_val_form['ultima_edicion'] = $this->ultima_edicion;
      $NM_val_form['ruta_bd_tns'] = $this->ruta_bd_tns;
      $NM_val_form['ip'] = $this->ip;
      $NM_val_form['integrar_tns'] = $this->integrar_tns;
      $NM_val_form['nube_pedidos'] = $this->nube_pedidos;
      $NM_val_form['nube_inventario'] = $this->nube_inventario;
      $NM_val_form['nube_cartera'] = $this->nube_cartera;
      $NM_val_form['nube_tesoreria'] = $this->nube_tesoreria;
      $NM_val_form['nube_agenda'] = $this->nube_agenda;
      $NM_val_form['nube_compras'] = $this->nube_compras;
      $NM_val_form['nube_codigo'] = $this->nube_codigo;
      $NM_val_form['token'] = $this->token;
      $NM_val_form['password'] = $this->password;
      $NM_val_form['habilitar_comprobantes'] = $this->habilitar_comprobantes;
      $NM_val_form['licencia_activa'] = $this->licencia_activa;
      $NM_val_form['fecha_activacion'] = $this->fecha_activacion;
      $NM_val_form['cod_cliente'] = $this->cod_cliente;
      $NM_val_form['probarnube'] = $this->probarnube;
      if ($this->idconfiguraciones === "" || is_null($this->idconfiguraciones))  
      { 
          $this->idconfiguraciones = 0;
      } 
      if ($this->lineasporfactura === "" || is_null($this->lineasporfactura))  
      { 
          $this->lineasporfactura = 0;
          $this->sc_force_zero[] = 'lineasporfactura';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->espaciado === "" || is_null($this->espaciado))  
      { 
          $this->espaciado = 0;
          $this->sc_force_zero[] = 'espaciado';
      } 
      if ($this->refresh_grid_doc === "" || is_null($this->refresh_grid_doc))  
      { 
          $this->refresh_grid_doc = 0;
          $this->sc_force_zero[] = 'refresh_grid_doc';
      } 
      if ($this->dia_limite_pago === "" || is_null($this->dia_limite_pago))  
      { 
          $this->dia_limite_pago = 0;
          $this->sc_force_zero[] = 'dia_limite_pago';
      } 
      if ($this->valor_propina_sugerida === "" || is_null($this->valor_propina_sugerida))  
      { 
          $this->valor_propina_sugerida = 0;
          $this->sc_force_zero[] = 'valor_propina_sugerida';
      } 
      if ($this->cal_valores_decimales === "" || is_null($this->cal_valores_decimales))  
      { 
          $this->cal_valores_decimales = 0;
          $this->sc_force_zero[] = 'cal_valores_decimales';
      } 
      if ($this->cal_cantidades_decimales === "" || is_null($this->cal_cantidades_decimales))  
      { 
          $this->cal_cantidades_decimales = 0;
          $this->sc_force_zero[] = 'cal_cantidades_decimales';
      } 
      if ($this->minutos_inactividad === "" || is_null($this->minutos_inactividad))  
      { 
          $this->minutos_inactividad = 0;
          $this->sc_force_zero[] = 'minutos_inactividad';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->consolidararticulos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->consolidararticulos = "null"; 
              $NM_val_null[] = "consolidararticulos";
          } 
          $this->serial_before_qstr = $this->serial;
          $this->serial = substr($this->Db->qstr($this->serial), 1, -1); 
          if ($this->serial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->serial = "null"; 
              $NM_val_null[] = "serial";
          } 
          if ($this->fecha == "")  
          { 
              $this->fecha = "null"; 
              $NM_val_null[] = "fecha";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->ultima_edicion == "")  
              { 
                  $this->ultima_edicion = "null"; 
                  $NM_val_null[] = "ultima_edicion";
              } 
              if ($this->ultima_edicion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->ultima_edicion = "null"; 
                  $NM_val_null[] = "ultima_edicion";
              } 
          }
          if ($this->activo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->activo = "null"; 
              $NM_val_null[] = "activo";
          } 
          $this->nombre_pc_before_qstr = $this->nombre_pc;
          $this->nombre_pc = substr($this->Db->qstr($this->nombre_pc), 1, -1); 
          if ($this->nombre_pc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_pc = "null"; 
              $NM_val_null[] = "nombre_pc";
          } 
          $this->nombre_impre_before_qstr = $this->nombre_impre;
          $this->nombre_impre = substr($this->Db->qstr($this->nombre_impre), 1, -1); 
          if ($this->nombre_impre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_impre = "null"; 
              $NM_val_null[] = "nombre_impre";
          } 
          $this->ruta_bd_tns_before_qstr = $this->ruta_bd_tns;
          $this->ruta_bd_tns = substr($this->Db->qstr($this->ruta_bd_tns), 1, -1); 
          if ($this->ruta_bd_tns == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ruta_bd_tns = "null"; 
              $NM_val_null[] = "ruta_bd_tns";
          } 
          $this->ip_before_qstr = $this->ip;
          $this->ip = substr($this->Db->qstr($this->ip), 1, -1); 
          if ($this->ip == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ip = "null"; 
              $NM_val_null[] = "ip";
          } 
          if ($this->modificainvpedido == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->modificainvpedido = "null"; 
              $NM_val_null[] = "modificainvpedido";
          } 
          if ($this->caja_movil == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->caja_movil = "null"; 
              $NM_val_null[] = "caja_movil";
          } 
          if ($this->integrar_tns == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->integrar_tns = "null"; 
              $NM_val_null[] = "integrar_tns";
          } 
          if ($this->essociedad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->essociedad = "null"; 
              $NM_val_null[] = "essociedad";
          } 
          if ($this->grancontr == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->grancontr = "null"; 
              $NM_val_null[] = "grancontr";
          } 
          if ($this->apertura_caja == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apertura_caja = "null"; 
              $NM_val_null[] = "apertura_caja";
          } 
          if ($this->control_diasmora == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->control_diasmora = "null"; 
              $NM_val_null[] = "control_diasmora";
          } 
          if ($this->control_costo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->control_costo = "null"; 
              $NM_val_null[] = "control_costo";
          } 
          if ($this->activar_console_log == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->activar_console_log = "null"; 
              $NM_val_null[] = "activar_console_log";
          } 
          if ($this->pago_automatico == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pago_automatico = "null"; 
              $NM_val_null[] = "pago_automatico";
          } 
          if ($this->tipodoc_pordefecto_pos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipodoc_pordefecto_pos = "null"; 
              $NM_val_null[] = "tipodoc_pordefecto_pos";
          } 
          if ($this->nube_pedidos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nube_pedidos = "null"; 
              $NM_val_null[] = "nube_pedidos";
          } 
          if ($this->nube_inventario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nube_inventario = "null"; 
              $NM_val_null[] = "nube_inventario";
          } 
          if ($this->nube_cartera == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nube_cartera = "null"; 
              $NM_val_null[] = "nube_cartera";
          } 
          if ($this->nube_tesoreria == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nube_tesoreria = "null"; 
              $NM_val_null[] = "nube_tesoreria";
          } 
          if ($this->nube_agenda == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nube_agenda = "null"; 
              $NM_val_null[] = "nube_agenda";
          } 
          if ($this->nube_compras == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nube_compras = "null"; 
              $NM_val_null[] = "nube_compras";
          } 
          $this->nube_codigo_before_qstr = $this->nube_codigo;
          $this->nube_codigo = substr($this->Db->qstr($this->nube_codigo), 1, -1); 
          if ($this->nube_codigo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nube_codigo = "null"; 
              $NM_val_null[] = "nube_codigo";
          } 
          $this->token_before_qstr = $this->token;
          $this->token = substr($this->Db->qstr($this->token), 1, -1); 
          if ($this->token == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->token = "null"; 
              $NM_val_null[] = "token";
          } 
          $this->password_before_qstr = $this->password;
          $this->password = substr($this->Db->qstr($this->password), 1, -1); 
          if ($this->password == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->password = "null"; 
              $NM_val_null[] = "password";
          } 
          if ($this->codproducto_en_facventa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codproducto_en_facventa = "null"; 
              $NM_val_null[] = "codproducto_en_facventa";
          } 
          if ($this->habilitar_comprobantes == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->habilitar_comprobantes = "null"; 
              $NM_val_null[] = "habilitar_comprobantes";
          } 
          if ($this->noborrar_tmp_enpos == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->noborrar_tmp_enpos = "null"; 
              $NM_val_null[] = "noborrar_tmp_enpos";
          } 
          if ($this->desactivar_control_sesion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->desactivar_control_sesion = "null"; 
              $NM_val_null[] = "desactivar_control_sesion";
          } 
          if ($this->licencia_activa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->licencia_activa = "null"; 
              $NM_val_null[] = "licencia_activa";
          } 
          if ($this->fecha_activacion == "")  
          { 
              $this->fecha_activacion = "null"; 
              $NM_val_null[] = "fecha_activacion";
          } 
          $this->cod_cliente_before_qstr = $this->cod_cliente;
          $this->cod_cliente = substr($this->Db->qstr($this->cod_cliente), 1, -1); 
          if ($this->cod_cliente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cod_cliente = "null"; 
              $NM_val_null[] = "cod_cliente";
          } 
          if ($this->validar_correo_enlinea == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->validar_correo_enlinea = "null"; 
              $NM_val_null[] = "validar_correo_enlinea";
          } 
          if ($this->ver_xml_fe == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_xml_fe = "null"; 
              $NM_val_null[] = "ver_xml_fe";
          } 
          if ($this->columna_imprimir_ticket == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->columna_imprimir_ticket = "null"; 
              $NM_val_null[] = "columna_imprimir_ticket";
          } 
          if ($this->columna_imprimir_a4 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->columna_imprimir_a4 = "null"; 
              $NM_val_null[] = "columna_imprimir_a4";
          } 
          if ($this->columna_whatsapp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->columna_whatsapp = "null"; 
              $NM_val_null[] = "columna_whatsapp";
          } 
          if ($this->columna_npedido == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->columna_npedido = "null"; 
              $NM_val_null[] = "columna_npedido";
          } 
          if ($this->columna_reg_pdf_propio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->columna_reg_pdf_propio = "null"; 
              $NM_val_null[] = "columna_reg_pdf_propio";
          } 
          if ($this->ver_grupo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_grupo = "null"; 
              $NM_val_null[] = "ver_grupo";
          } 
          if ($this->ver_codigo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_codigo = "null"; 
              $NM_val_null[] = "ver_codigo";
          } 
          if ($this->ver_imagen == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_imagen = "null"; 
              $NM_val_null[] = "ver_imagen";
          } 
          if ($this->ver_existencia == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_existencia = "null"; 
              $NM_val_null[] = "ver_existencia";
          } 
          if ($this->ver_unidad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_unidad = "null"; 
              $NM_val_null[] = "ver_unidad";
          } 
          if ($this->ver_precio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_precio = "null"; 
              $NM_val_null[] = "ver_precio";
          } 
          if ($this->ver_impuesto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_impuesto = "null"; 
              $NM_val_null[] = "ver_impuesto";
          } 
          if ($this->ver_stock == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_stock = "null"; 
              $NM_val_null[] = "ver_stock";
          } 
          if ($this->ver_ubicacion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_ubicacion = "null"; 
              $NM_val_null[] = "ver_ubicacion";
          } 
          if ($this->ver_costo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_costo = "null"; 
              $NM_val_null[] = "ver_costo";
          } 
          if ($this->ver_proveedor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_proveedor = "null"; 
              $NM_val_null[] = "ver_proveedor";
          } 
          if ($this->ver_combo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_combo = "null"; 
              $NM_val_null[] = "ver_combo";
          } 
          if ($this->ver_agregar_nota == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_agregar_nota = "null"; 
              $NM_val_null[] = "ver_agregar_nota";
          } 
          if ($this->ver_busqueda_refinada == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ver_busqueda_refinada = "null"; 
              $NM_val_null[] = "ver_busqueda_refinada";
          } 
          if ($this->validar_codbarras == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->validar_codbarras = "null"; 
              $NM_val_null[] = "validar_codbarras";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_configuraciones_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "lineasporfactura = $this->lineasporfactura, consolidararticulos = '$this->consolidararticulos', serial = '$this->serial', fecha = #$this->fecha#, activo = '$this->activo', espaciado = $this->espaciado, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', refresh_grid_doc = $this->refresh_grid_doc, modificainvpedido = '$this->modificainvpedido', caja_movil = '$this->caja_movil', essociedad = '$this->essociedad', grancontr = '$this->grancontr', apertura_caja = '$this->apertura_caja', control_diasmora = '$this->control_diasmora', control_costo = '$this->control_costo', activar_console_log = '$this->activar_console_log', pago_automatico = '$this->pago_automatico', tipodoc_pordefecto_pos = '$this->tipodoc_pordefecto_pos', codproducto_en_facventa = '$this->codproducto_en_facventa', noborrar_tmp_enpos = '$this->noborrar_tmp_enpos', desactivar_control_sesion = '$this->desactivar_control_sesion', dia_limite_pago = $this->dia_limite_pago, valor_propina_sugerida = $this->valor_propina_sugerida, validar_correo_enlinea = '$this->validar_correo_enlinea', ver_xml_fe = '$this->ver_xml_fe', columna_imprimir_ticket = '$this->columna_imprimir_ticket', columna_imprimir_a4 = '$this->columna_imprimir_a4', columna_whatsapp = '$this->columna_whatsapp', columna_npedido = '$this->columna_npedido', columna_reg_pdf_propio = '$this->columna_reg_pdf_propio', ver_grupo = '$this->ver_grupo', ver_codigo = '$this->ver_codigo', ver_imagen = '$this->ver_imagen', ver_existencia = '$this->ver_existencia', ver_unidad = '$this->ver_unidad', ver_precio = '$this->ver_precio', ver_impuesto = '$this->ver_impuesto', ver_stock = '$this->ver_stock', ver_ubicacion = '$this->ver_ubicacion', ver_costo = '$this->ver_costo', ver_proveedor = '$this->ver_proveedor', ver_combo = '$this->ver_combo', ver_agregar_nota = '$this->ver_agregar_nota', ver_busqueda_refinada = '$this->ver_busqueda_refinada', cal_valores_decimales = $this->cal_valores_decimales, cal_cantidades_decimales = $this->cal_cantidades_decimales, validar_codbarras = '$this->validar_codbarras', minutos_inactividad = $this->minutos_inactividad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "lineasporfactura = $this->lineasporfactura, consolidararticulos = '$this->consolidararticulos', serial = '$this->serial', fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", activo = '$this->activo', espaciado = $this->espaciado, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', refresh_grid_doc = $this->refresh_grid_doc, modificainvpedido = '$this->modificainvpedido', caja_movil = '$this->caja_movil', essociedad = '$this->essociedad', grancontr = '$this->grancontr', apertura_caja = '$this->apertura_caja', control_diasmora = '$this->control_diasmora', control_costo = '$this->control_costo', activar_console_log = '$this->activar_console_log', pago_automatico = '$this->pago_automatico', tipodoc_pordefecto_pos = '$this->tipodoc_pordefecto_pos', codproducto_en_facventa = '$this->codproducto_en_facventa', noborrar_tmp_enpos = '$this->noborrar_tmp_enpos', desactivar_control_sesion = '$this->desactivar_control_sesion', dia_limite_pago = $this->dia_limite_pago, valor_propina_sugerida = $this->valor_propina_sugerida, validar_correo_enlinea = '$this->validar_correo_enlinea', ver_xml_fe = '$this->ver_xml_fe', columna_imprimir_ticket = '$this->columna_imprimir_ticket', columna_imprimir_a4 = '$this->columna_imprimir_a4', columna_whatsapp = '$this->columna_whatsapp', columna_npedido = '$this->columna_npedido', columna_reg_pdf_propio = '$this->columna_reg_pdf_propio', ver_grupo = '$this->ver_grupo', ver_codigo = '$this->ver_codigo', ver_imagen = '$this->ver_imagen', ver_existencia = '$this->ver_existencia', ver_unidad = '$this->ver_unidad', ver_precio = '$this->ver_precio', ver_impuesto = '$this->ver_impuesto', ver_stock = '$this->ver_stock', ver_ubicacion = '$this->ver_ubicacion', ver_costo = '$this->ver_costo', ver_proveedor = '$this->ver_proveedor', ver_combo = '$this->ver_combo', ver_agregar_nota = '$this->ver_agregar_nota', ver_busqueda_refinada = '$this->ver_busqueda_refinada', cal_valores_decimales = $this->cal_valores_decimales, cal_cantidades_decimales = $this->cal_cantidades_decimales, validar_codbarras = '$this->validar_codbarras', minutos_inactividad = $this->minutos_inactividad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "lineasporfactura = $this->lineasporfactura, consolidararticulos = '$this->consolidararticulos', serial = '$this->serial', fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", activo = '$this->activo', espaciado = $this->espaciado, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', refresh_grid_doc = $this->refresh_grid_doc, modificainvpedido = '$this->modificainvpedido', caja_movil = '$this->caja_movil', essociedad = '$this->essociedad', grancontr = '$this->grancontr', apertura_caja = '$this->apertura_caja', control_diasmora = '$this->control_diasmora', control_costo = '$this->control_costo', activar_console_log = '$this->activar_console_log', pago_automatico = '$this->pago_automatico', tipodoc_pordefecto_pos = '$this->tipodoc_pordefecto_pos', codproducto_en_facventa = '$this->codproducto_en_facventa', noborrar_tmp_enpos = '$this->noborrar_tmp_enpos', desactivar_control_sesion = '$this->desactivar_control_sesion', dia_limite_pago = $this->dia_limite_pago, valor_propina_sugerida = $this->valor_propina_sugerida, validar_correo_enlinea = '$this->validar_correo_enlinea', ver_xml_fe = '$this->ver_xml_fe', columna_imprimir_ticket = '$this->columna_imprimir_ticket', columna_imprimir_a4 = '$this->columna_imprimir_a4', columna_whatsapp = '$this->columna_whatsapp', columna_npedido = '$this->columna_npedido', columna_reg_pdf_propio = '$this->columna_reg_pdf_propio', ver_grupo = '$this->ver_grupo', ver_codigo = '$this->ver_codigo', ver_imagen = '$this->ver_imagen', ver_existencia = '$this->ver_existencia', ver_unidad = '$this->ver_unidad', ver_precio = '$this->ver_precio', ver_impuesto = '$this->ver_impuesto', ver_stock = '$this->ver_stock', ver_ubicacion = '$this->ver_ubicacion', ver_costo = '$this->ver_costo', ver_proveedor = '$this->ver_proveedor', ver_combo = '$this->ver_combo', ver_agregar_nota = '$this->ver_agregar_nota', ver_busqueda_refinada = '$this->ver_busqueda_refinada', cal_valores_decimales = $this->cal_valores_decimales, cal_cantidades_decimales = $this->cal_cantidades_decimales, validar_codbarras = '$this->validar_codbarras', minutos_inactividad = $this->minutos_inactividad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "lineasporfactura = $this->lineasporfactura, consolidararticulos = '$this->consolidararticulos', serial = '$this->serial', fecha = EXTEND('$this->fecha', YEAR TO DAY), activo = '$this->activo', espaciado = $this->espaciado, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', refresh_grid_doc = $this->refresh_grid_doc, modificainvpedido = '$this->modificainvpedido', caja_movil = '$this->caja_movil', essociedad = '$this->essociedad', grancontr = '$this->grancontr', apertura_caja = '$this->apertura_caja', control_diasmora = '$this->control_diasmora', control_costo = '$this->control_costo', activar_console_log = '$this->activar_console_log', pago_automatico = '$this->pago_automatico', tipodoc_pordefecto_pos = '$this->tipodoc_pordefecto_pos', codproducto_en_facventa = '$this->codproducto_en_facventa', noborrar_tmp_enpos = '$this->noborrar_tmp_enpos', desactivar_control_sesion = '$this->desactivar_control_sesion', dia_limite_pago = $this->dia_limite_pago, valor_propina_sugerida = $this->valor_propina_sugerida, validar_correo_enlinea = '$this->validar_correo_enlinea', ver_xml_fe = '$this->ver_xml_fe', columna_imprimir_ticket = '$this->columna_imprimir_ticket', columna_imprimir_a4 = '$this->columna_imprimir_a4', columna_whatsapp = '$this->columna_whatsapp', columna_npedido = '$this->columna_npedido', columna_reg_pdf_propio = '$this->columna_reg_pdf_propio', ver_grupo = '$this->ver_grupo', ver_codigo = '$this->ver_codigo', ver_imagen = '$this->ver_imagen', ver_existencia = '$this->ver_existencia', ver_unidad = '$this->ver_unidad', ver_precio = '$this->ver_precio', ver_impuesto = '$this->ver_impuesto', ver_stock = '$this->ver_stock', ver_ubicacion = '$this->ver_ubicacion', ver_costo = '$this->ver_costo', ver_proveedor = '$this->ver_proveedor', ver_combo = '$this->ver_combo', ver_agregar_nota = '$this->ver_agregar_nota', ver_busqueda_refinada = '$this->ver_busqueda_refinada', cal_valores_decimales = $this->cal_valores_decimales, cal_cantidades_decimales = $this->cal_cantidades_decimales, validar_codbarras = '$this->validar_codbarras', minutos_inactividad = $this->minutos_inactividad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "lineasporfactura = $this->lineasporfactura, consolidararticulos = '$this->consolidararticulos', serial = '$this->serial', fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", activo = '$this->activo', espaciado = $this->espaciado, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', refresh_grid_doc = $this->refresh_grid_doc, modificainvpedido = '$this->modificainvpedido', caja_movil = '$this->caja_movil', essociedad = '$this->essociedad', grancontr = '$this->grancontr', apertura_caja = '$this->apertura_caja', control_diasmora = '$this->control_diasmora', control_costo = '$this->control_costo', activar_console_log = '$this->activar_console_log', pago_automatico = '$this->pago_automatico', tipodoc_pordefecto_pos = '$this->tipodoc_pordefecto_pos', codproducto_en_facventa = '$this->codproducto_en_facventa', noborrar_tmp_enpos = '$this->noborrar_tmp_enpos', desactivar_control_sesion = '$this->desactivar_control_sesion', dia_limite_pago = $this->dia_limite_pago, valor_propina_sugerida = $this->valor_propina_sugerida, validar_correo_enlinea = '$this->validar_correo_enlinea', ver_xml_fe = '$this->ver_xml_fe', columna_imprimir_ticket = '$this->columna_imprimir_ticket', columna_imprimir_a4 = '$this->columna_imprimir_a4', columna_whatsapp = '$this->columna_whatsapp', columna_npedido = '$this->columna_npedido', columna_reg_pdf_propio = '$this->columna_reg_pdf_propio', ver_grupo = '$this->ver_grupo', ver_codigo = '$this->ver_codigo', ver_imagen = '$this->ver_imagen', ver_existencia = '$this->ver_existencia', ver_unidad = '$this->ver_unidad', ver_precio = '$this->ver_precio', ver_impuesto = '$this->ver_impuesto', ver_stock = '$this->ver_stock', ver_ubicacion = '$this->ver_ubicacion', ver_costo = '$this->ver_costo', ver_proveedor = '$this->ver_proveedor', ver_combo = '$this->ver_combo', ver_agregar_nota = '$this->ver_agregar_nota', ver_busqueda_refinada = '$this->ver_busqueda_refinada', cal_valores_decimales = $this->cal_valores_decimales, cal_cantidades_decimales = $this->cal_cantidades_decimales, validar_codbarras = '$this->validar_codbarras', minutos_inactividad = $this->minutos_inactividad"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "lineasporfactura = $this->lineasporfactura, consolidararticulos = '$this->consolidararticulos', serial = '$this->serial', fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", activo = '$this->activo', espaciado = $this->espaciado, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', refresh_grid_doc = $this->refresh_grid_doc, modificainvpedido = '$this->modificainvpedido', caja_movil = '$this->caja_movil', essociedad = '$this->essociedad', grancontr = '$this->grancontr', apertura_caja = '$this->apertura_caja', control_diasmora = '$this->control_diasmora', control_costo = '$this->control_costo', activar_console_log = '$this->activar_console_log', pago_automatico = '$this->pago_automatico', tipodoc_pordefecto_pos = '$this->tipodoc_pordefecto_pos', codproducto_en_facventa = '$this->codproducto_en_facventa', noborrar_tmp_enpos = '$this->noborrar_tmp_enpos', desactivar_control_sesion = '$this->desactivar_control_sesion', dia_limite_pago = $this->dia_limite_pago, valor_propina_sugerida = $this->valor_propina_sugerida, validar_correo_enlinea = '$this->validar_correo_enlinea', ver_xml_fe = '$this->ver_xml_fe', columna_imprimir_ticket = '$this->columna_imprimir_ticket', columna_imprimir_a4 = '$this->columna_imprimir_a4', columna_whatsapp = '$this->columna_whatsapp', columna_npedido = '$this->columna_npedido', columna_reg_pdf_propio = '$this->columna_reg_pdf_propio', ver_grupo = '$this->ver_grupo', ver_codigo = '$this->ver_codigo', ver_imagen = '$this->ver_imagen', ver_existencia = '$this->ver_existencia', ver_unidad = '$this->ver_unidad', ver_precio = '$this->ver_precio', ver_impuesto = '$this->ver_impuesto', ver_stock = '$this->ver_stock', ver_ubicacion = '$this->ver_ubicacion', ver_costo = '$this->ver_costo', ver_proveedor = '$this->ver_proveedor', ver_combo = '$this->ver_combo', ver_agregar_nota = '$this->ver_agregar_nota', ver_busqueda_refinada = '$this->ver_busqueda_refinada', cal_valores_decimales = $this->cal_valores_decimales, cal_cantidades_decimales = $this->cal_cantidades_decimales, validar_codbarras = '$this->validar_codbarras', minutos_inactividad = $this->minutos_inactividad"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "lineasporfactura = $this->lineasporfactura, consolidararticulos = '$this->consolidararticulos', serial = '$this->serial', fecha = " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", activo = '$this->activo', espaciado = $this->espaciado, nombre_pc = '$this->nombre_pc', nombre_impre = '$this->nombre_impre', refresh_grid_doc = $this->refresh_grid_doc, modificainvpedido = '$this->modificainvpedido', caja_movil = '$this->caja_movil', essociedad = '$this->essociedad', grancontr = '$this->grancontr', apertura_caja = '$this->apertura_caja', control_diasmora = '$this->control_diasmora', control_costo = '$this->control_costo', activar_console_log = '$this->activar_console_log', pago_automatico = '$this->pago_automatico', tipodoc_pordefecto_pos = '$this->tipodoc_pordefecto_pos', codproducto_en_facventa = '$this->codproducto_en_facventa', noborrar_tmp_enpos = '$this->noborrar_tmp_enpos', desactivar_control_sesion = '$this->desactivar_control_sesion', dia_limite_pago = $this->dia_limite_pago, valor_propina_sugerida = $this->valor_propina_sugerida, validar_correo_enlinea = '$this->validar_correo_enlinea', ver_xml_fe = '$this->ver_xml_fe', columna_imprimir_ticket = '$this->columna_imprimir_ticket', columna_imprimir_a4 = '$this->columna_imprimir_a4', columna_whatsapp = '$this->columna_whatsapp', columna_npedido = '$this->columna_npedido', columna_reg_pdf_propio = '$this->columna_reg_pdf_propio', ver_grupo = '$this->ver_grupo', ver_codigo = '$this->ver_codigo', ver_imagen = '$this->ver_imagen', ver_existencia = '$this->ver_existencia', ver_unidad = '$this->ver_unidad', ver_precio = '$this->ver_precio', ver_impuesto = '$this->ver_impuesto', ver_stock = '$this->ver_stock', ver_ubicacion = '$this->ver_ubicacion', ver_costo = '$this->ver_costo', ver_proveedor = '$this->ver_proveedor', ver_combo = '$this->ver_combo', ver_agregar_nota = '$this->ver_agregar_nota', ver_busqueda_refinada = '$this->ver_busqueda_refinada', cal_valores_decimales = $this->cal_valores_decimales, cal_cantidades_decimales = $this->cal_cantidades_decimales, validar_codbarras = '$this->validar_codbarras', minutos_inactividad = $this->minutos_inactividad"; 
              } 
              if (isset($NM_val_form['ultima_edicion']) && $NM_val_form['ultima_edicion'] != $this->nmgp_dados_select['ultima_edicion']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "ultima_edicion = TO_DATE('$this->ultima_edicion', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "ultima_edicion = '$this->ultima_edicion'"; 
                  } 
              } 
              if (isset($NM_val_form['ruta_bd_tns']) && $NM_val_form['ruta_bd_tns'] != $this->nmgp_dados_select['ruta_bd_tns']) 
              { 
                  $SC_fields_update[] = "ruta_bd_tns = '$this->ruta_bd_tns'"; 
              } 
              if (isset($NM_val_form['ip']) && $NM_val_form['ip'] != $this->nmgp_dados_select['ip']) 
              { 
                  $SC_fields_update[] = "ip = '$this->ip'"; 
              } 
              if (isset($NM_val_form['integrar_tns']) && $NM_val_form['integrar_tns'] != $this->nmgp_dados_select['integrar_tns']) 
              { 
                  $SC_fields_update[] = "integrar_tns = '$this->integrar_tns'"; 
              } 
              if (isset($NM_val_form['nube_pedidos']) && $NM_val_form['nube_pedidos'] != $this->nmgp_dados_select['nube_pedidos']) 
              { 
                  $SC_fields_update[] = "nube_pedidos = '$this->nube_pedidos'"; 
              } 
              if (isset($NM_val_form['nube_inventario']) && $NM_val_form['nube_inventario'] != $this->nmgp_dados_select['nube_inventario']) 
              { 
                  $SC_fields_update[] = "nube_inventario = '$this->nube_inventario'"; 
              } 
              if (isset($NM_val_form['nube_cartera']) && $NM_val_form['nube_cartera'] != $this->nmgp_dados_select['nube_cartera']) 
              { 
                  $SC_fields_update[] = "nube_cartera = '$this->nube_cartera'"; 
              } 
              if (isset($NM_val_form['nube_tesoreria']) && $NM_val_form['nube_tesoreria'] != $this->nmgp_dados_select['nube_tesoreria']) 
              { 
                  $SC_fields_update[] = "nube_tesoreria = '$this->nube_tesoreria'"; 
              } 
              if (isset($NM_val_form['nube_agenda']) && $NM_val_form['nube_agenda'] != $this->nmgp_dados_select['nube_agenda']) 
              { 
                  $SC_fields_update[] = "nube_agenda = '$this->nube_agenda'"; 
              } 
              if (isset($NM_val_form['nube_compras']) && $NM_val_form['nube_compras'] != $this->nmgp_dados_select['nube_compras']) 
              { 
                  $SC_fields_update[] = "nube_compras = '$this->nube_compras'"; 
              } 
              if (isset($NM_val_form['nube_codigo']) && $NM_val_form['nube_codigo'] != $this->nmgp_dados_select['nube_codigo']) 
              { 
                  $SC_fields_update[] = "nube_codigo = '$this->nube_codigo'"; 
              } 
              if (isset($NM_val_form['token']) && $NM_val_form['token'] != $this->nmgp_dados_select['token']) 
              { 
                  $SC_fields_update[] = "token = '$this->token'"; 
              } 
              if (isset($NM_val_form['password']) && $NM_val_form['password'] != $this->nmgp_dados_select['password']) 
              { 
                  $SC_fields_update[] = "password = '$this->password'"; 
              } 
              if (isset($NM_val_form['habilitar_comprobantes']) && $NM_val_form['habilitar_comprobantes'] != $this->nmgp_dados_select['habilitar_comprobantes']) 
              { 
                  $SC_fields_update[] = "habilitar_comprobantes = '$this->habilitar_comprobantes'"; 
              } 
              if (isset($NM_val_form['licencia_activa']) && $NM_val_form['licencia_activa'] != $this->nmgp_dados_select['licencia_activa']) 
              { 
                  $SC_fields_update[] = "licencia_activa = '$this->licencia_activa'"; 
              } 
              if (isset($NM_val_form['fecha_activacion']) && $NM_val_form['fecha_activacion'] != $this->nmgp_dados_select['fecha_activacion']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fecha_activacion = #$this->fecha_activacion#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fecha_activacion = EXTEND('" . $this->fecha_activacion . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fecha_activacion = " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['cod_cliente']) && $NM_val_form['cod_cliente'] != $this->nmgp_dados_select['cod_cliente']) 
              { 
                  $SC_fields_update[] = "cod_cliente = '$this->cod_cliente'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idconfiguraciones = $this->idconfiguraciones ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idconfiguraciones = $this->idconfiguraciones ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idconfiguraciones = $this->idconfiguraciones ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idconfiguraciones = $this->idconfiguraciones ";  
              }  
              else  
              {
                  $comando .= " WHERE idconfiguraciones = $this->idconfiguraciones ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_configuraciones_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->serial = $this->serial_before_qstr;
              $this->nombre_pc = $this->nombre_pc_before_qstr;
              $this->nombre_impre = $this->nombre_impre_before_qstr;
              $this->ruta_bd_tns = $this->ruta_bd_tns_before_qstr;
              $this->ip = $this->ip_before_qstr;
              $this->nube_codigo = $this->nube_codigo_before_qstr;
              $this->token = $this->token_before_qstr;
              $this->password = $this->password_before_qstr;
              $this->cod_cliente = $this->cod_cliente_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['idconfiguraciones'])) { $this->idconfiguraciones = $NM_val_form['idconfiguraciones']; }
              elseif (isset($this->idconfiguraciones)) { $this->nm_limpa_alfa($this->idconfiguraciones); }
              if     (isset($NM_val_form) && isset($NM_val_form['lineasporfactura'])) { $this->lineasporfactura = $NM_val_form['lineasporfactura']; }
              elseif (isset($this->lineasporfactura)) { $this->nm_limpa_alfa($this->lineasporfactura); }
              if     (isset($NM_val_form) && isset($NM_val_form['serial'])) { $this->serial = $NM_val_form['serial']; }
              elseif (isset($this->serial)) { $this->nm_limpa_alfa($this->serial); }
              if     (isset($NM_val_form) && isset($NM_val_form['espaciado'])) { $this->espaciado = $NM_val_form['espaciado']; }
              elseif (isset($this->espaciado)) { $this->nm_limpa_alfa($this->espaciado); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_pc'])) { $this->nombre_pc = $NM_val_form['nombre_pc']; }
              elseif (isset($this->nombre_pc)) { $this->nm_limpa_alfa($this->nombre_pc); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_impre'])) { $this->nombre_impre = $NM_val_form['nombre_impre']; }
              elseif (isset($this->nombre_impre)) { $this->nm_limpa_alfa($this->nombre_impre); }
              if     (isset($NM_val_form) && isset($NM_val_form['refresh_grid_doc'])) { $this->refresh_grid_doc = $NM_val_form['refresh_grid_doc']; }
              elseif (isset($this->refresh_grid_doc)) { $this->nm_limpa_alfa($this->refresh_grid_doc); }
              if     (isset($NM_val_form) && isset($NM_val_form['dia_limite_pago'])) { $this->dia_limite_pago = $NM_val_form['dia_limite_pago']; }
              elseif (isset($this->dia_limite_pago)) { $this->nm_limpa_alfa($this->dia_limite_pago); }
              if     (isset($NM_val_form) && isset($NM_val_form['valor_propina_sugerida'])) { $this->valor_propina_sugerida = $NM_val_form['valor_propina_sugerida']; }
              elseif (isset($this->valor_propina_sugerida)) { $this->nm_limpa_alfa($this->valor_propina_sugerida); }
              if     (isset($NM_val_form) && isset($NM_val_form['cal_valores_decimales'])) { $this->cal_valores_decimales = $NM_val_form['cal_valores_decimales']; }
              elseif (isset($this->cal_valores_decimales)) { $this->nm_limpa_alfa($this->cal_valores_decimales); }
              if     (isset($NM_val_form) && isset($NM_val_form['cal_cantidades_decimales'])) { $this->cal_cantidades_decimales = $NM_val_form['cal_cantidades_decimales']; }
              elseif (isset($this->cal_cantidades_decimales)) { $this->nm_limpa_alfa($this->cal_cantidades_decimales); }
              if     (isset($NM_val_form) && isset($NM_val_form['minutos_inactividad'])) { $this->minutos_inactividad = $NM_val_form['minutos_inactividad']; }
              elseif (isset($this->minutos_inactividad)) { $this->nm_limpa_alfa($this->minutos_inactividad); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('lineasporfactura', 'consolidararticulos', 'serial', 'fecha', 'activo', 'espaciado', 'minutos_inactividad', 'caja_movil', 'pago_automatico', 'dia_limite_pago', 'refresh_grid_doc', 'desactivar_control_sesion', 'nombre_pc', 'nombre_impre', 'essociedad', 'grancontr', 'idconfiguraciones', 'control_diasmora', 'control_costo', 'modificainvpedido', 'tipodoc_pordefecto_pos', 'ver_xml_fe', 'noborrar_tmp_enpos', 'validar_correo_enlinea', 'apertura_caja', 'activar_console_log', 'codproducto_en_facventa', 'valor_propina_sugerida', 'columna_imprimir_ticket', 'columna_imprimir_a4', 'columna_whatsapp', 'columna_npedido', 'columna_reg_pdf_propio', 'ver_busqueda_refinada', 'cal_valores_decimales', 'cal_cantidades_decimales', 'validar_codbarras', 'ver_grupo', 'ver_codigo', 'ver_imagen', 'ver_existencia', 'ver_unidad', 'ver_precio', 'ver_impuesto', 'ver_stock', 'ver_ubicacion', 'ver_costo', 'ver_proveedor', 'ver_combo', 'ver_agregar_nota'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idconfiguraciones, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_configuraciones_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", '$this->ultima_edicion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES ($this->lineasporfactura, '$this->consolidararticulos', '$this->serial', #$this->fecha#, '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', #$this->fecha_activacion#, '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", '$this->ultima_edicion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ", '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", '$this->ultima_edicion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ", '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", TO_DATE('$this->ultima_edicion', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ", '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", '$this->ultima_edicion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', EXTEND('$this->fecha', YEAR TO DAY), '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', EXTEND('$this->fecha_activacion', YEAR TO FRACTION), '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", '$this->ultima_edicion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ", '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", '$this->ultima_edicion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ", '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", TO_DATE('$this->ultima_edicion', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ", '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->ultima_edicion != "")
                  { 
                       $compl_insert     .= ", ultima_edicion";
                       $compl_insert_val .= ", '$this->ultima_edicion'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "lineasporfactura, consolidararticulos, serial, fecha, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad $compl_insert) VALUES (" . $NM_seq_auto . "$this->lineasporfactura, '$this->consolidararticulos', '$this->serial', " . $this->Ini->date_delim . $this->fecha . $this->Ini->date_delim1 . ", '$this->activo', $this->espaciado, '$this->nombre_pc', '$this->nombre_impre', '$this->ruta_bd_tns', '$this->ip', $this->refresh_grid_doc, '$this->modificainvpedido', '$this->caja_movil', '$this->integrar_tns', '$this->essociedad', '$this->grancontr', '$this->apertura_caja', '$this->control_diasmora', '$this->control_costo', '$this->activar_console_log', '$this->pago_automatico', '$this->tipodoc_pordefecto_pos', '$this->nube_pedidos', '$this->nube_inventario', '$this->nube_cartera', '$this->nube_tesoreria', '$this->nube_agenda', '$this->nube_compras', '$this->nube_codigo', '$this->token', '$this->password', '$this->codproducto_en_facventa', '$this->habilitar_comprobantes', '$this->noborrar_tmp_enpos', '$this->desactivar_control_sesion', $this->dia_limite_pago, '$this->licencia_activa', " . $this->Ini->date_delim . $this->fecha_activacion . $this->Ini->date_delim1 . ", '$this->cod_cliente', $this->valor_propina_sugerida, '$this->validar_correo_enlinea', '$this->ver_xml_fe', '$this->columna_imprimir_ticket', '$this->columna_imprimir_a4', '$this->columna_whatsapp', '$this->columna_npedido', '$this->columna_reg_pdf_propio', '$this->ver_grupo', '$this->ver_codigo', '$this->ver_imagen', '$this->ver_existencia', '$this->ver_unidad', '$this->ver_precio', '$this->ver_impuesto', '$this->ver_stock', '$this->ver_ubicacion', '$this->ver_costo', '$this->ver_proveedor', '$this->ver_combo', '$this->ver_agregar_nota', '$this->ver_busqueda_refinada', $this->cal_valores_decimales, $this->cal_cantidades_decimales, '$this->validar_codbarras', $this->minutos_inactividad $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_configuraciones_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_configuraciones_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idconfiguraciones =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idconfiguraciones = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idconfiguraciones = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idconfiguraciones = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idconfiguraciones = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idconfiguraciones = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idconfiguraciones = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->idconfiguraciones = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->serial = $this->serial_before_qstr;
              $this->nombre_pc = $this->nombre_pc_before_qstr;
              $this->nombre_impre = $this->nombre_impre_before_qstr;
              $this->ruta_bd_tns = $this->ruta_bd_tns_before_qstr;
              $this->ip = $this->ip_before_qstr;
              $this->nube_codigo = $this->nube_codigo_before_qstr;
              $this->token = $this->token_before_qstr;
              $this->password = $this->password_before_qstr;
              $this->cod_cliente = $this->cod_cliente_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->serial = $this->serial_before_qstr;
              $this->nombre_pc = $this->nombre_pc_before_qstr;
              $this->nombre_impre = $this->nombre_impre_before_qstr;
              $this->ruta_bd_tns = $this->ruta_bd_tns_before_qstr;
              $this->ip = $this->ip_before_qstr;
              $this->nube_codigo = $this->nube_codigo_before_qstr;
              $this->token = $this->token_before_qstr;
              $this->password = $this->password_before_qstr;
              $this->cod_cliente = $this->cod_cliente_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idconfiguraciones = substr($this->Db->qstr($this->idconfiguraciones), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idconfiguraciones = $this->idconfiguraciones "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_configuraciones_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['decimal_db'] == ",")
        {
           $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_apertura_caja = $this->apertura_caja;
    $original_consolidararticulos = $this->consolidararticulos;
    $original_espaciado = $this->espaciado;
    $original_lineasporfactura = $this->lineasporfactura;
    $original_nombre_impre = $this->nombre_impre;
    $original_nombre_pc = $this->nombre_pc;
    $original_refresh_grid_doc = $this->refresh_grid_doc;
}
if (!isset($this->sc_temp_gapertura_caja)) {$this->sc_temp_gapertura_caja = (isset($_SESSION['gapertura_caja'])) ? $_SESSION['gapertura_caja'] : "";}
if (!isset($this->sc_temp_glineasporfactura)) {$this->sc_temp_glineasporfactura = (isset($_SESSION['glineasporfactura'])) ? $_SESSION['glineasporfactura'] : "";}
if (!isset($this->sc_temp_gimpresorapos)) {$this->sc_temp_gimpresorapos = (isset($_SESSION['gimpresorapos'])) ? $_SESSION['gimpresorapos'] : "";}
if (!isset($this->sc_temp_gTiempoSegRefreshDoc)) {$this->sc_temp_gTiempoSegRefreshDoc = (isset($_SESSION['gTiempoSegRefreshDoc'])) ? $_SESSION['gTiempoSegRefreshDoc'] : "";}
if (!isset($this->sc_temp_gespaciadodetallefactura)) {$this->sc_temp_gespaciadodetallefactura = (isset($_SESSION['gespaciadodetallefactura'])) ? $_SESSION['gespaciadodetallefactura'] : "";}
if (!isset($this->sc_temp_gconsolidararticulos)) {$this->sc_temp_gconsolidararticulos = (isset($_SESSION['gconsolidararticulos'])) ? $_SESSION['gconsolidararticulos'] : "";}
if (!isset($this->sc_temp_gidtercero)) {$this->sc_temp_gidtercero = (isset($_SESSION['gidtercero'])) ? $_SESSION['gidtercero'] : "";}
  $this->sc_temp_gconsolidararticulos = $this->consolidararticulos ;
$this->sc_temp_gespaciadodetallefactura = $this->espaciado ;
if(empty($this->refresh_grid_doc ))
{
	$this->refresh_grid_doc  = "0";
}

$this->sc_temp_gTiempoSegRefreshDoc = $this->refresh_grid_doc ;

if(!empty($this->nombre_pc ) and !empty($this->nombre_impre ))
{
	$this->sc_temp_gimpresorapos = "//".$this->nombre_pc ."/".$this->nombre_impre ;
}
else
{
	$this->sc_temp_gimpresorapos = "";
}

$this->sc_temp_glineasporfactura = $this->lineasporfactura ;

if($this->sc_temp_gapertura_caja!=$this->apertura_caja )
{
	
     $nm_select ="update usuarios set sesion_id=null where tercero='".$this->sc_temp_gidtercero."'"; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_configuraciones_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
}
if (isset($this->sc_temp_gidtercero)) { $_SESSION['gidtercero'] = $this->sc_temp_gidtercero;}
if (isset($this->sc_temp_gconsolidararticulos)) { $_SESSION['gconsolidararticulos'] = $this->sc_temp_gconsolidararticulos;}
if (isset($this->sc_temp_gespaciadodetallefactura)) { $_SESSION['gespaciadodetallefactura'] = $this->sc_temp_gespaciadodetallefactura;}
if (isset($this->sc_temp_gTiempoSegRefreshDoc)) { $_SESSION['gTiempoSegRefreshDoc'] = $this->sc_temp_gTiempoSegRefreshDoc;}
if (isset($this->sc_temp_gimpresorapos)) { $_SESSION['gimpresorapos'] = $this->sc_temp_gimpresorapos;}
if (isset($this->sc_temp_glineasporfactura)) { $_SESSION['glineasporfactura'] = $this->sc_temp_glineasporfactura;}
if (isset($this->sc_temp_gapertura_caja)) { $_SESSION['gapertura_caja'] = $this->sc_temp_gapertura_caja;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_apertura_caja != $this->apertura_caja || (isset($bFlagRead_apertura_caja) && $bFlagRead_apertura_caja)))
    {
        $this->ajax_return_values_apertura_caja(true);
    }
    if (($original_consolidararticulos != $this->consolidararticulos || (isset($bFlagRead_consolidararticulos) && $bFlagRead_consolidararticulos)))
    {
        $this->ajax_return_values_consolidararticulos(true);
    }
    if (($original_espaciado != $this->espaciado || (isset($bFlagRead_espaciado) && $bFlagRead_espaciado)))
    {
        $this->ajax_return_values_espaciado(true);
    }
    if (($original_lineasporfactura != $this->lineasporfactura || (isset($bFlagRead_lineasporfactura) && $bFlagRead_lineasporfactura)))
    {
        $this->ajax_return_values_lineasporfactura(true);
    }
    if (($original_nombre_impre != $this->nombre_impre || (isset($bFlagRead_nombre_impre) && $bFlagRead_nombre_impre)))
    {
        $this->ajax_return_values_nombre_impre(true);
    }
    if (($original_nombre_pc != $this->nombre_pc || (isset($bFlagRead_nombre_pc) && $bFlagRead_nombre_pc)))
    {
        $this->ajax_return_values_nombre_pc(true);
    }
    if (($original_refresh_grid_doc != $this->refresh_grid_doc || (isset($bFlagRead_refresh_grid_doc) && $bFlagRead_refresh_grid_doc)))
    {
        $this->ajax_return_values_refresh_grid_doc(true);
    }
}
$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['parms'] = "idconfiguraciones?#?$this->idconfiguraciones?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idconfiguraciones = null === $this->idconfiguraciones ? null : substr($this->Db->qstr($this->idconfiguraciones), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT idconfiguraciones, lineasporfactura, consolidararticulos, serial, str_replace (convert(char(10),fecha,102), '.', '-') + ' ' + convert(char(8),fecha,20), ultima_edicion, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, str_replace (convert(char(10),fecha_activacion,102), '.', '-') + ' ' + convert(char(8),fecha_activacion,20), cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT idconfiguraciones, lineasporfactura, consolidararticulos, serial, convert(char(23),fecha,121), ultima_edicion, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, convert(char(23),fecha_activacion,121), cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT idconfiguraciones, lineasporfactura, consolidararticulos, serial, fecha, TO_DATE(TO_CHAR(ultima_edicion, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT idconfiguraciones, lineasporfactura, consolidararticulos, serial, EXTEND(fecha, YEAR TO DAY), ultima_edicion, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, EXTEND(fecha_activacion, YEAR TO FRACTION), cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT idconfiguraciones, lineasporfactura, consolidararticulos, serial, fecha, ultima_edicion, activo, espaciado, nombre_pc, nombre_impre, ruta_bd_tns, ip, refresh_grid_doc, modificainvpedido, caja_movil, integrar_tns, essociedad, grancontr, apertura_caja, control_diasmora, control_costo, activar_console_log, pago_automatico, tipodoc_pordefecto_pos, nube_pedidos, nube_inventario, nube_cartera, nube_tesoreria, nube_agenda, nube_compras, nube_codigo, token, password, codproducto_en_facventa, habilitar_comprobantes, noborrar_tmp_enpos, desactivar_control_sesion, dia_limite_pago, licencia_activa, fecha_activacion, cod_cliente, valor_propina_sugerida, validar_correo_enlinea, ver_xml_fe, columna_imprimir_ticket, columna_imprimir_a4, columna_whatsapp, columna_npedido, columna_reg_pdf_propio, ver_grupo, ver_codigo, ver_imagen, ver_existencia, ver_unidad, ver_precio, ver_impuesto, ver_stock, ver_ubicacion, ver_costo, ver_proveedor, ver_combo, ver_agregar_nota, ver_busqueda_refinada, cal_valores_decimales, cal_cantidades_decimales, validar_codbarras, minutos_inactividad from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "idconfiguraciones='1'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "idconfiguraciones = $this->idconfiguraciones"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "idconfiguraciones = $this->idconfiguraciones"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "idconfiguraciones = $this->idconfiguraciones"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "idconfiguraciones = $this->idconfiguraciones"; 
                  }  
                  else  
                  {
                     $aWhere[] = "idconfiguraciones = $this->idconfiguraciones"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "idconfiguraciones";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['activar'] = $this->nmgp_botoes['activar'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes['update'] = "off";
              $this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes['delete'] = "off";
              return; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->idconfiguraciones = $rs->fields[0] ; 
              $this->nmgp_dados_select['idconfiguraciones'] = $this->idconfiguraciones;
              $this->lineasporfactura = $rs->fields[1] ; 
              $this->nmgp_dados_select['lineasporfactura'] = $this->lineasporfactura;
              $this->consolidararticulos = $rs->fields[2] ; 
              $this->nmgp_dados_select['consolidararticulos'] = $this->consolidararticulos;
              $this->serial = $rs->fields[3] ; 
              $this->nmgp_dados_select['serial'] = $this->serial;
              $this->fecha = $rs->fields[4] ; 
              $this->nmgp_dados_select['fecha'] = $this->fecha;
              $this->ultima_edicion = $rs->fields[5] ; 
              if (substr($this->ultima_edicion, 10, 1) == "-") 
              { 
                 $this->ultima_edicion = substr($this->ultima_edicion, 0, 10) . " " . substr($this->ultima_edicion, 11);
              } 
              if (substr($this->ultima_edicion, 13, 1) == ".") 
              { 
                 $this->ultima_edicion = substr($this->ultima_edicion, 0, 13) . ":" . substr($this->ultima_edicion, 14, 2) . ":" . substr($this->ultima_edicion, 17);
              } 
              $this->nmgp_dados_select['ultima_edicion'] = $this->ultima_edicion;
              $this->activo = $rs->fields[6] ; 
              $this->nmgp_dados_select['activo'] = $this->activo;
              $this->espaciado = trim($rs->fields[7]) ; 
              $this->nmgp_dados_select['espaciado'] = $this->espaciado;
              $this->nombre_pc = $rs->fields[8] ; 
              $this->nmgp_dados_select['nombre_pc'] = $this->nombre_pc;
              $this->nombre_impre = $rs->fields[9] ; 
              $this->nmgp_dados_select['nombre_impre'] = $this->nombre_impre;
              $this->ruta_bd_tns = $rs->fields[10] ; 
              $this->nmgp_dados_select['ruta_bd_tns'] = $this->ruta_bd_tns;
              $this->ip = $rs->fields[11] ; 
              $this->nmgp_dados_select['ip'] = $this->ip;
              $this->refresh_grid_doc = $rs->fields[12] ; 
              $this->nmgp_dados_select['refresh_grid_doc'] = $this->refresh_grid_doc;
              $this->modificainvpedido = $rs->fields[13] ; 
              $this->nmgp_dados_select['modificainvpedido'] = $this->modificainvpedido;
              $this->caja_movil = $rs->fields[14] ; 
              $this->nmgp_dados_select['caja_movil'] = $this->caja_movil;
              $this->integrar_tns = $rs->fields[15] ; 
              $this->nmgp_dados_select['integrar_tns'] = $this->integrar_tns;
              $this->essociedad = $rs->fields[16] ; 
              $this->nmgp_dados_select['essociedad'] = $this->essociedad;
              $this->grancontr = $rs->fields[17] ; 
              $this->nmgp_dados_select['grancontr'] = $this->grancontr;
              $this->apertura_caja = $rs->fields[18] ; 
              $this->nmgp_dados_select['apertura_caja'] = $this->apertura_caja;
              $this->control_diasmora = $rs->fields[19] ; 
              $this->nmgp_dados_select['control_diasmora'] = $this->control_diasmora;
              $this->control_costo = $rs->fields[20] ; 
              $this->nmgp_dados_select['control_costo'] = $this->control_costo;
              $this->activar_console_log = $rs->fields[21] ; 
              $this->nmgp_dados_select['activar_console_log'] = $this->activar_console_log;
              $this->pago_automatico = $rs->fields[22] ; 
              $this->nmgp_dados_select['pago_automatico'] = $this->pago_automatico;
              $this->tipodoc_pordefecto_pos = $rs->fields[23] ; 
              $this->nmgp_dados_select['tipodoc_pordefecto_pos'] = $this->tipodoc_pordefecto_pos;
              $this->nube_pedidos = $rs->fields[24] ; 
              $this->nmgp_dados_select['nube_pedidos'] = $this->nube_pedidos;
              $this->nube_inventario = $rs->fields[25] ; 
              $this->nmgp_dados_select['nube_inventario'] = $this->nube_inventario;
              $this->nube_cartera = $rs->fields[26] ; 
              $this->nmgp_dados_select['nube_cartera'] = $this->nube_cartera;
              $this->nube_tesoreria = $rs->fields[27] ; 
              $this->nmgp_dados_select['nube_tesoreria'] = $this->nube_tesoreria;
              $this->nube_agenda = $rs->fields[28] ; 
              $this->nmgp_dados_select['nube_agenda'] = $this->nube_agenda;
              $this->nube_compras = $rs->fields[29] ; 
              $this->nmgp_dados_select['nube_compras'] = $this->nube_compras;
              $this->nube_codigo = $rs->fields[30] ; 
              $this->nmgp_dados_select['nube_codigo'] = $this->nube_codigo;
              $this->token = $rs->fields[31] ; 
              $this->nmgp_dados_select['token'] = $this->token;
              $this->password = $rs->fields[32] ; 
              $this->nmgp_dados_select['password'] = $this->password;
              $this->codproducto_en_facventa = $rs->fields[33] ; 
              $this->nmgp_dados_select['codproducto_en_facventa'] = $this->codproducto_en_facventa;
              $this->habilitar_comprobantes = $rs->fields[34] ; 
              $this->nmgp_dados_select['habilitar_comprobantes'] = $this->habilitar_comprobantes;
              $this->noborrar_tmp_enpos = $rs->fields[35] ; 
              $this->nmgp_dados_select['noborrar_tmp_enpos'] = $this->noborrar_tmp_enpos;
              $this->desactivar_control_sesion = $rs->fields[36] ; 
              $this->nmgp_dados_select['desactivar_control_sesion'] = $this->desactivar_control_sesion;
              $this->dia_limite_pago = $rs->fields[37] ; 
              $this->nmgp_dados_select['dia_limite_pago'] = $this->dia_limite_pago;
              $this->licencia_activa = $rs->fields[38] ; 
              $this->nmgp_dados_select['licencia_activa'] = $this->licencia_activa;
              $this->fecha_activacion = $rs->fields[39] ; 
              if (substr($this->fecha_activacion, 10, 1) == "-") 
              { 
                 $this->fecha_activacion = substr($this->fecha_activacion, 0, 10) . " " . substr($this->fecha_activacion, 11);
              } 
              if (substr($this->fecha_activacion, 13, 1) == ".") 
              { 
                 $this->fecha_activacion = substr($this->fecha_activacion, 0, 13) . ":" . substr($this->fecha_activacion, 14, 2) . ":" . substr($this->fecha_activacion, 17);
              } 
              $this->nmgp_dados_select['fecha_activacion'] = $this->fecha_activacion;
              $this->cod_cliente = $rs->fields[40] ; 
              $this->nmgp_dados_select['cod_cliente'] = $this->cod_cliente;
              $this->valor_propina_sugerida = $rs->fields[41] ; 
              $this->nmgp_dados_select['valor_propina_sugerida'] = $this->valor_propina_sugerida;
              $this->validar_correo_enlinea = $rs->fields[42] ; 
              $this->nmgp_dados_select['validar_correo_enlinea'] = $this->validar_correo_enlinea;
              $this->ver_xml_fe = $rs->fields[43] ; 
              $this->nmgp_dados_select['ver_xml_fe'] = $this->ver_xml_fe;
              $this->columna_imprimir_ticket = $rs->fields[44] ; 
              $this->nmgp_dados_select['columna_imprimir_ticket'] = $this->columna_imprimir_ticket;
              $this->columna_imprimir_a4 = $rs->fields[45] ; 
              $this->nmgp_dados_select['columna_imprimir_a4'] = $this->columna_imprimir_a4;
              $this->columna_whatsapp = $rs->fields[46] ; 
              $this->nmgp_dados_select['columna_whatsapp'] = $this->columna_whatsapp;
              $this->columna_npedido = $rs->fields[47] ; 
              $this->nmgp_dados_select['columna_npedido'] = $this->columna_npedido;
              $this->columna_reg_pdf_propio = $rs->fields[48] ; 
              $this->nmgp_dados_select['columna_reg_pdf_propio'] = $this->columna_reg_pdf_propio;
              $this->ver_grupo = $rs->fields[49] ; 
              $this->nmgp_dados_select['ver_grupo'] = $this->ver_grupo;
              $this->ver_codigo = $rs->fields[50] ; 
              $this->nmgp_dados_select['ver_codigo'] = $this->ver_codigo;
              $this->ver_imagen = $rs->fields[51] ; 
              $this->nmgp_dados_select['ver_imagen'] = $this->ver_imagen;
              $this->ver_existencia = $rs->fields[52] ; 
              $this->nmgp_dados_select['ver_existencia'] = $this->ver_existencia;
              $this->ver_unidad = $rs->fields[53] ; 
              $this->nmgp_dados_select['ver_unidad'] = $this->ver_unidad;
              $this->ver_precio = $rs->fields[54] ; 
              $this->nmgp_dados_select['ver_precio'] = $this->ver_precio;
              $this->ver_impuesto = $rs->fields[55] ; 
              $this->nmgp_dados_select['ver_impuesto'] = $this->ver_impuesto;
              $this->ver_stock = $rs->fields[56] ; 
              $this->nmgp_dados_select['ver_stock'] = $this->ver_stock;
              $this->ver_ubicacion = $rs->fields[57] ; 
              $this->nmgp_dados_select['ver_ubicacion'] = $this->ver_ubicacion;
              $this->ver_costo = $rs->fields[58] ; 
              $this->nmgp_dados_select['ver_costo'] = $this->ver_costo;
              $this->ver_proveedor = $rs->fields[59] ; 
              $this->nmgp_dados_select['ver_proveedor'] = $this->ver_proveedor;
              $this->ver_combo = $rs->fields[60] ; 
              $this->nmgp_dados_select['ver_combo'] = $this->ver_combo;
              $this->ver_agregar_nota = $rs->fields[61] ; 
              $this->nmgp_dados_select['ver_agregar_nota'] = $this->ver_agregar_nota;
              $this->ver_busqueda_refinada = $rs->fields[62] ; 
              $this->nmgp_dados_select['ver_busqueda_refinada'] = $this->ver_busqueda_refinada;
              $this->cal_valores_decimales = $rs->fields[63] ; 
              $this->nmgp_dados_select['cal_valores_decimales'] = $this->cal_valores_decimales;
              $this->cal_cantidades_decimales = $rs->fields[64] ; 
              $this->nmgp_dados_select['cal_cantidades_decimales'] = $this->cal_cantidades_decimales;
              $this->validar_codbarras = $rs->fields[65] ; 
              $this->nmgp_dados_select['validar_codbarras'] = $this->validar_codbarras;
              $this->minutos_inactividad = $rs->fields[66] ; 
              $this->nmgp_dados_select['minutos_inactividad'] = $this->minutos_inactividad;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idconfiguraciones = (string)$this->idconfiguraciones; 
              $this->lineasporfactura = (string)$this->lineasporfactura; 
              $this->espaciado = (strpos(strtolower($this->espaciado), "e")) ? (float)$this->espaciado : $this->espaciado; 
              $this->espaciado = (string)$this->espaciado; 
              $this->refresh_grid_doc = (string)$this->refresh_grid_doc; 
              $this->dia_limite_pago = (string)$this->dia_limite_pago; 
              $this->valor_propina_sugerida = (string)$this->valor_propina_sugerida; 
              $this->cal_valores_decimales = (string)$this->cal_valores_decimales; 
              $this->cal_cantidades_decimales = (string)$this->cal_cantidades_decimales; 
              $this->minutos_inactividad = (string)$this->minutos_inactividad; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['parms'] = "idconfiguraciones?#?$this->idconfiguraciones?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['reg_start'] < $qt_geral_reg_form_configuraciones;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->idconfiguraciones = "";  
              $this->nmgp_dados_form["idconfiguraciones"] = $this->idconfiguraciones;
              $this->lineasporfactura = "";  
              $this->nmgp_dados_form["lineasporfactura"] = $this->lineasporfactura;
              $this->consolidararticulos = "";  
              $this->nmgp_dados_form["consolidararticulos"] = $this->consolidararticulos;
              $this->serial = "";  
              $this->nmgp_dados_form["serial"] = $this->serial;
              $this->fecha = "";  
              $this->fecha_hora = "" ;  
              $this->nmgp_dados_form["fecha"] = $this->fecha;
              $this->ultima_edicion = "";  
              $this->ultima_edicion_hora = "" ;  
              $this->nmgp_dados_form["ultima_edicion"] = $this->ultima_edicion;
              $this->activo = "";  
              $this->nmgp_dados_form["activo"] = $this->activo;
              $this->espaciado = "";  
              $this->nmgp_dados_form["espaciado"] = $this->espaciado;
              $this->nombre_pc = "";  
              $this->nmgp_dados_form["nombre_pc"] = $this->nombre_pc;
              $this->nombre_impre = "";  
              $this->nmgp_dados_form["nombre_impre"] = $this->nombre_impre;
              $this->ruta_bd_tns = "";  
              $this->nmgp_dados_form["ruta_bd_tns"] = $this->ruta_bd_tns;
              $this->ip = "";  
              $this->nmgp_dados_form["ip"] = $this->ip;
              $this->refresh_grid_doc = "";  
              $this->nmgp_dados_form["refresh_grid_doc"] = $this->refresh_grid_doc;
              $this->modificainvpedido = "";  
              $this->nmgp_dados_form["modificainvpedido"] = $this->modificainvpedido;
              $this->caja_movil = "";  
              $this->nmgp_dados_form["caja_movil"] = $this->caja_movil;
              $this->integrar_tns = "";  
              $this->nmgp_dados_form["integrar_tns"] = $this->integrar_tns;
              $this->essociedad = "";  
              $this->nmgp_dados_form["essociedad"] = $this->essociedad;
              $this->grancontr = "";  
              $this->nmgp_dados_form["grancontr"] = $this->grancontr;
              $this->apertura_caja = "";  
              $this->nmgp_dados_form["apertura_caja"] = $this->apertura_caja;
              $this->control_diasmora = "";  
              $this->nmgp_dados_form["control_diasmora"] = $this->control_diasmora;
              $this->control_costo = "";  
              $this->nmgp_dados_form["control_costo"] = $this->control_costo;
              $this->activar_console_log = "";  
              $this->nmgp_dados_form["activar_console_log"] = $this->activar_console_log;
              $this->pago_automatico = "";  
              $this->nmgp_dados_form["pago_automatico"] = $this->pago_automatico;
              $this->tipodoc_pordefecto_pos = "";  
              $this->nmgp_dados_form["tipodoc_pordefecto_pos"] = $this->tipodoc_pordefecto_pos;
              $this->nube_pedidos = "NO";  
              $this->nmgp_dados_form["nube_pedidos"] = $this->nube_pedidos;
              $this->nube_inventario = "NO";  
              $this->nmgp_dados_form["nube_inventario"] = $this->nube_inventario;
              $this->nube_cartera = "NO";  
              $this->nmgp_dados_form["nube_cartera"] = $this->nube_cartera;
              $this->nube_tesoreria = "NO";  
              $this->nmgp_dados_form["nube_tesoreria"] = $this->nube_tesoreria;
              $this->nube_agenda = "NO";  
              $this->nmgp_dados_form["nube_agenda"] = $this->nube_agenda;
              $this->nube_compras = "NO";  
              $this->nmgp_dados_form["nube_compras"] = $this->nube_compras;
              $this->nube_codigo = "";  
              $this->nmgp_dados_form["nube_codigo"] = $this->nube_codigo;
              $this->token = "";  
              $this->nmgp_dados_form["token"] = $this->token;
              $this->password = "";  
              $this->nmgp_dados_form["password"] = $this->password;
              $this->codproducto_en_facventa = "NO";  
              $this->nmgp_dados_form["codproducto_en_facventa"] = $this->codproducto_en_facventa;
              $this->habilitar_comprobantes = "NO";  
              $this->nmgp_dados_form["habilitar_comprobantes"] = $this->habilitar_comprobantes;
              $this->noborrar_tmp_enpos = "NO";  
              $this->nmgp_dados_form["noborrar_tmp_enpos"] = $this->noborrar_tmp_enpos;
              $this->desactivar_control_sesion = "NO";  
              $this->nmgp_dados_form["desactivar_control_sesion"] = $this->desactivar_control_sesion;
              $this->dia_limite_pago = "";  
              $this->nmgp_dados_form["dia_limite_pago"] = $this->dia_limite_pago;
              $this->licencia_activa = "";  
              $this->nmgp_dados_form["licencia_activa"] = $this->licencia_activa;
              $this->fecha_activacion = "";  
              $this->fecha_activacion_hora = "" ;  
              $this->nmgp_dados_form["fecha_activacion"] = $this->fecha_activacion;
              $this->cod_cliente = "";  
              $this->nmgp_dados_form["cod_cliente"] = $this->cod_cliente;
              $this->valor_propina_sugerida = "0";  
              $this->nmgp_dados_form["valor_propina_sugerida"] = $this->valor_propina_sugerida;
              $this->validar_correo_enlinea = "NO";  
              $this->nmgp_dados_form["validar_correo_enlinea"] = $this->validar_correo_enlinea;
              $this->ver_xml_fe = "NO";  
              $this->nmgp_dados_form["ver_xml_fe"] = $this->ver_xml_fe;
              $this->columna_imprimir_ticket = "SI";  
              $this->nmgp_dados_form["columna_imprimir_ticket"] = $this->columna_imprimir_ticket;
              $this->columna_imprimir_a4 = "SI";  
              $this->nmgp_dados_form["columna_imprimir_a4"] = $this->columna_imprimir_a4;
              $this->columna_whatsapp = "SI";  
              $this->nmgp_dados_form["columna_whatsapp"] = $this->columna_whatsapp;
              $this->columna_npedido = "NO";  
              $this->nmgp_dados_form["columna_npedido"] = $this->columna_npedido;
              $this->columna_reg_pdf_propio = "NO";  
              $this->nmgp_dados_form["columna_reg_pdf_propio"] = $this->columna_reg_pdf_propio;
              $this->ver_grupo = "NO";  
              $this->nmgp_dados_form["ver_grupo"] = $this->ver_grupo;
              $this->ver_codigo = "SI";  
              $this->nmgp_dados_form["ver_codigo"] = $this->ver_codigo;
              $this->ver_imagen = "NO";  
              $this->nmgp_dados_form["ver_imagen"] = $this->ver_imagen;
              $this->ver_existencia = "SI";  
              $this->nmgp_dados_form["ver_existencia"] = $this->ver_existencia;
              $this->ver_unidad = "SI";  
              $this->nmgp_dados_form["ver_unidad"] = $this->ver_unidad;
              $this->ver_precio = "SI";  
              $this->nmgp_dados_form["ver_precio"] = $this->ver_precio;
              $this->ver_impuesto = "NO";  
              $this->nmgp_dados_form["ver_impuesto"] = $this->ver_impuesto;
              $this->ver_stock = "SI";  
              $this->nmgp_dados_form["ver_stock"] = $this->ver_stock;
              $this->ver_ubicacion = "NO";  
              $this->nmgp_dados_form["ver_ubicacion"] = $this->ver_ubicacion;
              $this->ver_costo = "NO";  
              $this->nmgp_dados_form["ver_costo"] = $this->ver_costo;
              $this->ver_proveedor = "NO";  
              $this->nmgp_dados_form["ver_proveedor"] = $this->ver_proveedor;
              $this->ver_combo = "NO";  
              $this->nmgp_dados_form["ver_combo"] = $this->ver_combo;
              $this->ver_agregar_nota = "SI";  
              $this->nmgp_dados_form["ver_agregar_nota"] = $this->ver_agregar_nota;
              $this->ver_busqueda_refinada = "NO";  
              $this->nmgp_dados_form["ver_busqueda_refinada"] = $this->ver_busqueda_refinada;
              $this->cal_valores_decimales = "";  
              $this->nmgp_dados_form["cal_valores_decimales"] = $this->cal_valores_decimales;
              $this->cal_cantidades_decimales = "";  
              $this->nmgp_dados_form["cal_cantidades_decimales"] = $this->cal_cantidades_decimales;
              $this->validar_codbarras = "NO";  
              $this->nmgp_dados_form["validar_codbarras"] = $this->validar_codbarras;
              $this->minutos_inactividad = "60";  
              $this->nmgp_dados_form["minutos_inactividad"] = $this->minutos_inactividad;
              $this->probarnube = "";  
              $this->nmgp_dados_form["probarnube"] = $this->probarnube;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function apertura_caja_onClick()
{
$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
  
$original_apertura_caja = $this->apertura_caja;
$original_apertura_caja = $this->apertura_caja;
$original_idconfiguraciones = $this->idconfiguraciones;


if($this->apertura_caja  != "SI")
{
	 
      $nm_select = "select coalesce(c.detalle,'') as detalle from caja c where c.detalle='BASE' and (select c2.idapertura from caja c2 where c2.idapertura=c.idcaja) is null order by c.idcaja desc limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiHayApertura = array();
      $this->vsihayapertura = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vSiHayApertura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsihayapertura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiHayApertura = false;
          $this->vSiHayApertura_erro = $this->Db->ErrorMsg();
          $this->vsihayapertura = false;
          $this->vsihayapertura_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vsihayapertura[0][0]))
	{
		$this->apertura_caja  = "SI";
		$this->sc_ajax_message("No se puede puede modificar la opción ya que tiene cajas sin cerrar.", "Advertencia", "", "");
	}
}

if($this->apertura_caja  == "SI")
{
	 
      $nm_select = "select cajero from bancos where cajero is not null limit 1"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->vSiHayApertura = array();
      $this->vsihayapertura = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->vSiHayApertura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                      $this->vsihayapertura[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->vSiHayApertura = false;
          $this->vSiHayApertura_erro = $this->Db->ErrorMsg();
          $this->vsihayapertura = false;
          $this->vsihayapertura_erro = $this->Db->ErrorMsg();
      } 
;

	if(isset($this->vsihayapertura[0][0]))
	{
		$this->apertura_caja  = "NO";
		$this->sc_ajax_message("No se puede puede modificar la opción ya que hay usuarios que tienen cajas en uso.", "Advertencia", "", "");
	}
}


$modificado_apertura_caja = $this->apertura_caja;
$modificado_apertura_caja = $this->apertura_caja;
$modificado_idconfiguraciones = $this->idconfiguraciones;
$this->nm_formatar_campos('apertura_caja');
if ($original_apertura_caja !== $modificado_apertura_caja || isset($this->nmgp_cmp_readonly['apertura_caja']) || (isset($bFlagRead_apertura_caja) && $bFlagRead_apertura_caja))
{
    $this->ajax_return_values_apertura_caja(true);
}
if ($original_apertura_caja !== $modificado_apertura_caja || isset($this->nmgp_cmp_readonly['apertura_caja']) || (isset($bFlagRead_apertura_caja) && $bFlagRead_apertura_caja))
{
    $this->ajax_return_values_apertura_caja(true);
}
if ($original_idconfiguraciones !== $modificado_idconfiguraciones || isset($this->nmgp_cmp_readonly['idconfiguraciones']) || (isset($bFlagRead_idconfiguraciones) && $bFlagRead_idconfiguraciones))
{
    $this->ajax_return_values_idconfiguraciones(true);
}
$this->NM_ajax_info['event_field'] = 'apertura';
form_configuraciones_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off';
}
function serial_onClick()
{
$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
  

$this->sc_set_focus('consolidararticulos');

$this->nm_formatar_campos();
$this->NM_ajax_info['event_field'] = 'serial';
form_configuraciones_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off';
}
function serial_onFocus()
{
$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'on';
  

$this->sc_set_focus('consolidararticulos');

$this->nm_formatar_campos();
$this->NM_ajax_info['event_field'] = 'serial';
form_configuraciones_pack_ajax_response();
exit;


$_SESSION['scriptcase']['form_configuraciones']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_configuraciones_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
        include_once("form_configuraciones_form0.php");
        include_once("form_configuraciones_form1.php");
        include_once("form_configuraciones_form2.php");
        include_once("form_configuraciones_form3.php");
        $this->hideFormPages();
 }

        function initFormPages() {
                $this->Ini->nm_page_names = array(
                        'Pag1' => '0',
                        'Pag2' => '1',
                        'Pag3' => '2',
                        'Pag4' => '3',
                );

                $this->Ini->nm_page_blocks = array(
                        'Pag1' => array(
                                0 => 'on',
                                1 => 'on',
                        ),
                        'Pag2' => array(
                                2 => 'on',
                        ),
                        'Pag3' => array(
                                3 => 'on',
                        ),
                        'Pag4' => array(
                                4 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'Pag1',
                        1 => 'Pag1',
                        2 => 'Pag2',
                        3 => 'Pag3',
                        4 => 'Pag4',
                );

                if (!empty($this->Ini->nm_hidden_blocos)) {
                        foreach ($this->Ini->nm_hidden_blocos as $blockNo => $blockStatus) {
                                if ('off' == $blockStatus) {
                                        $this->Ini->nm_page_blocks[ $this->Ini->nm_block_page[$blockNo] ][$blockNo] = 'off';
                                }
                        }
                }

                foreach ($this->Ini->nm_page_blocks as $pageName => $pageBlocks) {
                        $hasDisplayedBlock = false;

                        foreach ($pageBlocks as $blockNo => $blockStatus) {
                                if ('on' == $blockStatus) {
                                        $hasDisplayedBlock = true;
                                }
                        }

                        if (!$hasDisplayedBlock) {
                                $this->Ini->nm_hidden_pages[$pageName] = 'off';
                        }
                }
        } // initFormPages

        function hideFormPages() {
                if (!empty($this->Ini->nm_hidden_pages)) {
?>
<script type="text/javascript">
$(function() {
        scResetPagesDisplay();
<?php
                        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                                if ('off' == $pageStatus) {
?>
        scHidePage("<?php echo $this->Ini->nm_page_names[$pageName]; ?>");
<?php
                                }
                        }
?>
        scCheckNoPageSelected();
});
</script>
<?php
                }
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("idconfiguraciones", "lineasporfactura", "consolidararticulos", "serial", "fecha", "ultima_edicion"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_consolidararticulos()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "S?#?S?#?N?@?";
       $nmgp_def_dados .= "N?#?N?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_caja_movil()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_pago_automatico()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_desactivar_control_sesion()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_essociedad()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_grancontr()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_control_diasmora()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_control_costo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_modificainvpedido()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipodoc_pordefecto_pos()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "FACTURA?#?FV?#?S?@?";
       $nmgp_def_dados .= "REMISIÓN?#?RS?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_xml_fe()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_noborrar_tmp_enpos()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_validar_correo_enlinea()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_apertura_caja()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_activar_console_log()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_codproducto_en_facventa()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_columna_imprimir_ticket()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_columna_imprimir_a4()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_columna_whatsapp()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_columna_npedido()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_columna_reg_pdf_propio()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_busqueda_refinada()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_validar_codbarras()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_grupo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_codigo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_imagen()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_existencia()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_unidad()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_precio()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_impuesto()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_stock()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_ubicacion()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_costo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_proveedor()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_combo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_ver_agregar_nota()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_configuraciones_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "idconfiguraciones", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "lineasporfactura", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_consolidararticulos($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "consolidararticulos", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "serial", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "fecha", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ultima_edicion", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter_form'] . " and (idconfiguraciones='1') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where idconfiguraciones='1' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_configuraciones = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['total'] = $qt_geral_reg_form_configuraciones;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_configuraciones_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_configuraciones_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "idconfiguraciones";$nm_numeric[] = "lineasporfactura";$nm_numeric[] = "espaciado";$nm_numeric[] = "refresh_grid_doc";$nm_numeric[] = "dia_limite_pago";$nm_numeric[] = "valor_propina_sugerida";$nm_numeric[] = "cal_valores_decimales";$nm_numeric[] = "cal_cantidades_decimales";$nm_numeric[] = "minutos_inactividad";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['fecha'] = "date";$Nm_datas['ultima_edicion'] = "timestamp";$Nm_datas['fecha_activacion'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_consolidararticulos($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['S'] = "S";
       $data_look['N'] = "N";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_configuraciones_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_configuraciones_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_configuraciones_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_configuraciones']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function sc_set_focus($sFieldName)
    {
        $sFieldName = strtolower($sFieldName);
        $aFocus = array(
                        'lineasporfactura' => 'lineasporfactura',
                        'consolidararticulos' => 'consolidararticulos',
                        'serial' => 'serial',
                        'fecha' => 'fecha',
                        'activo' => 'activo',
                        'espaciado' => 'espaciado',
                        'minutos_inactividad' => 'minutos_inactividad',
                        'caja_movil' => 'caja_movil',
                        'pago_automatico' => 'pago_automatico',
                        'dia_limite_pago' => 'dia_limite_pago',
                        'refresh_grid_doc' => 'refresh_grid_doc',
                        'desactivar_control_sesion' => 'desactivar_control_sesion',
                        'nombre_pc' => 'nombre_pc',
                        'nombre_impre' => 'nombre_impre',
                        'essociedad' => 'essociedad',
                        'grancontr' => 'grancontr',
                        'idconfiguraciones' => 'idconfiguraciones',
                        'control_diasmora' => 'control_diasmora',
                        'control_costo' => 'control_costo',
                        'modificainvpedido' => 'modificainvpedido',
                        'tipodoc_pordefecto_pos' => 'tipodoc_pordefecto_pos',
                        'ver_xml_fe' => 'ver_xml_fe',
                        'noborrar_tmp_enpos' => 'noborrar_tmp_enpos',
                        'validar_correo_enlinea' => 'validar_correo_enlinea',
                        'apertura_caja' => 'apertura_caja',
                        'activar_console_log' => 'activar_console_log',
                        'codproducto_en_facventa' => 'codproducto_en_facventa',
                        'valor_propina_sugerida' => 'valor_propina_sugerida',
                        'columna_imprimir_ticket' => 'columna_imprimir_ticket',
                        'columna_imprimir_a4' => 'columna_imprimir_a4',
                        'columna_whatsapp' => 'columna_whatsapp',
                        'columna_npedido' => 'columna_npedido',
                        'columna_reg_pdf_propio' => 'columna_reg_pdf_propio',
                        'ver_busqueda_refinada' => 'ver_busqueda_refinada',
                        'cal_valores_decimales' => 'cal_valores_decimales',
                        'cal_cantidades_decimales' => 'cal_cantidades_decimales',
                        'validar_codbarras' => 'validar_codbarras',
                        'ver_grupo' => 'ver_grupo',
                        'ver_codigo' => 'ver_codigo',
                        'ver_imagen' => 'ver_imagen',
                        'ver_existencia' => 'ver_existencia',
                        'ver_unidad' => 'ver_unidad',
                        'ver_precio' => 'ver_precio',
                        'ver_impuesto' => 'ver_impuesto',
                        'ver_stock' => 'ver_stock',
                        'ver_ubicacion' => 'ver_ubicacion',
                        'ver_costo' => 'ver_costo',
                        'ver_proveedor' => 'ver_proveedor',
                        'ver_combo' => 'ver_combo',
                        'ver_agregar_nota' => 'ver_agregar_nota',
                       );
        if (isset($aFocus[$sFieldName]))
        {
            $this->NM_ajax_info['focus'] = $aFocus[$sFieldName];
        }
    } // sc_set_focus
    function sc_ajax_message($sMessage, $sTitle = '', $sParam = '', $sRedirPar = '')
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxMessage'] = array();
            if ('' != $sParam)
            {
                $aParamList = explode('&', $sParam);
                foreach ($aParamList as $sParamItem)
                {
                    $aParamData = explode('=', $sParamItem);
                    if (2 == sizeof($aParamData) &&
                        in_array($aParamData[0], array('modal', 'timeout', 'button', 'button_label', 'top', 'left', 'width', 'height', 'redir', 'redir_target', 'show_close', 'body_icon', 'toast', 'toast_pos', 'type')))
                    {
                        $this->NM_ajax_info['ajaxMessage'][$aParamData[0]] = NM_charset_to_utf8($aParamData[1]);
                    }
                }
            }
            if (isset($this->NM_ajax_info['ajaxMessage']['redir']) && '' != $this->NM_ajax_info['ajaxMessage']['redir'] && '.php' == substr($this->NM_ajax_info['ajaxMessage']['redir'], -4) && 'http' != substr($this->NM_ajax_info['ajaxMessage']['redir'], 0, 4))
            {
                $this->NM_ajax_info['ajaxMessage']['redir'] = $this->Ini->path_link . SC_dir_app_name(substr($this->NM_ajax_info['ajaxMessage']['redir'], 0, -4)) . '/' . $this->NM_ajax_info['ajaxMessage']['redir'];
            }
            if ('' != $sRedirPar)
            {
                $this->NM_ajax_info['ajaxMessage']['redir_par'] = str_replace('=', '?#?', str_replace(';', '?@?', $sRedirPar));
            }
            else
            {
                $this->NM_ajax_info['ajaxMessage']['redir_par'] = '';
            }
            $this->NM_ajax_info['ajaxMessage']['message'] = NM_charset_to_utf8($sMessage);
            $this->NM_ajax_info['ajaxMessage']['title']   = NM_charset_to_utf8($sTitle);
            if (!isset($this->NM_ajax_info['ajaxMessage']['button']))
            {
                $this->NM_ajax_info['ajaxMessage']['button'] = 'Y';
            }
        }
    } // sc_ajax_message
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-1");
                break;
            case "activar":
                return array("sc_activar_top");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-2");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
