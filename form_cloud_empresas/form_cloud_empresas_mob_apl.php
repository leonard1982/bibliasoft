<?php
//
class form_cloud_empresas_mob_apl
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
                                'navSummary'        => array(),
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
   var $id_empresa;
   var $ccnit;
   var $nombre_razonsocial;
   var $celular;
   var $correo;
   var $activo;
   var $activo_1;
   var $creado;
   var $creado_hora;
   var $editado;
   var $editado_hora;
   var $codsucursal;
   var $cantidaddecimales;
   var $valortributounidad;
   var $observaciones;
   var $conf_auto_tercero;
   var $conf_auto_tercero_1;
   var $no_validar_mail;
   var $no_validar_mail_1;
   var $email_alternativo;
   var $servidor1;
   var $servidor2;
   var $servidor3;
   var $tokenempresa;
   var $tokenpassword;
   var $servidor1_pruebas;
   var $servidor2_pruebas;
   var $servidor3_pruebas;
   var $token_pruebas;
   var $password_pruebas;
   var $modo;
   var $modo_1;
   var $smtp_servidor;
   var $smtp_usuario;
   var $smtp_password;
   var $smtp_puerto;
   var $smtp_tipo;
   var $smtp_tipo_1;
   var $asunto;
   var $mensaje;
   var $correo_para_prueba;
   var $logo;
   var $logo_scfile_name;
   var $logo_ul_name;
   var $logo_scfile_type;
   var $logo_ul_type;
   var $logo_limpa;
   var $logo_salva;
   var $out_logo;
   var $out1_logo;
   var $enviar_documento_online;
   var $enviar_documento_online_1;
   var $contacto_nombre;
   var $contacto_cargo;
   var $contacto_correo;
   var $contacto_celular;
   var $contacto_fijo;
   var $servidor_facturas;
   var $correo_copia;
   var $direccion;
   var $ciudad;
   var $pagina_web;
   var $actividad_principal;
   var $regimen;
   var $regimen_1;
   var $desviar_correo_a;
   var $pie_pagina;
   var $mensaje_nc;
   var $pie_pagina_nc;
   var $servidor_nc;
   var $informacion_adicional;
   var $sumarimpuestosdeldetalle;
   var $sumarimpuestosdeldetalle_1;
   var $serial;
   var $nombre_pc_red;
   var $proveedor;
   var $proveedor_1;
   var $enviar_dian;
   var $enviar_dian_1;
   var $enviar_cliente;
   var $enviar_cliente_1;
   var $nit;
   var $razon_social;
   var $head_note;
   var $tomar_municipio_tns;
   var $tomar_municipio_tns_1;
   var $validar_codcliente_tns;
   var $validar_codcliente_tns_1;
   var $desactivar_xml_enlista;
   var $desactivar_xml_enlista_1;
   var $validar_correo_enlinea;
   var $validar_correo_enlinea_1;
   var $url_validar_licencia;
   var $url_bouncer;
   var $apikey_bouncer;
   var $tiempo_bouncer;
   var $enviar_datos_establecimiento;
   var $enviar_datos_establecimiento_1;
   var $correo_prueba;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
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
          if (isset($this->NM_ajax_info['param']['actividad_principal']))
          {
              $this->actividad_principal = $this->NM_ajax_info['param']['actividad_principal'];
          }
          if (isset($this->NM_ajax_info['param']['activo']))
          {
              $this->activo = $this->NM_ajax_info['param']['activo'];
          }
          if (isset($this->NM_ajax_info['param']['apikey_bouncer']))
          {
              $this->apikey_bouncer = $this->NM_ajax_info['param']['apikey_bouncer'];
          }
          if (isset($this->NM_ajax_info['param']['asunto']))
          {
              $this->asunto = $this->NM_ajax_info['param']['asunto'];
          }
          if (isset($this->NM_ajax_info['param']['cantidaddecimales']))
          {
              $this->cantidaddecimales = $this->NM_ajax_info['param']['cantidaddecimales'];
          }
          if (isset($this->NM_ajax_info['param']['ccnit']))
          {
              $this->ccnit = $this->NM_ajax_info['param']['ccnit'];
          }
          if (isset($this->NM_ajax_info['param']['celular']))
          {
              $this->celular = $this->NM_ajax_info['param']['celular'];
          }
          if (isset($this->NM_ajax_info['param']['ciudad']))
          {
              $this->ciudad = $this->NM_ajax_info['param']['ciudad'];
          }
          if (isset($this->NM_ajax_info['param']['codsucursal']))
          {
              $this->codsucursal = $this->NM_ajax_info['param']['codsucursal'];
          }
          if (isset($this->NM_ajax_info['param']['conf_auto_tercero']))
          {
              $this->conf_auto_tercero = $this->NM_ajax_info['param']['conf_auto_tercero'];
          }
          if (isset($this->NM_ajax_info['param']['contacto_cargo']))
          {
              $this->contacto_cargo = $this->NM_ajax_info['param']['contacto_cargo'];
          }
          if (isset($this->NM_ajax_info['param']['contacto_celular']))
          {
              $this->contacto_celular = $this->NM_ajax_info['param']['contacto_celular'];
          }
          if (isset($this->NM_ajax_info['param']['contacto_correo']))
          {
              $this->contacto_correo = $this->NM_ajax_info['param']['contacto_correo'];
          }
          if (isset($this->NM_ajax_info['param']['contacto_fijo']))
          {
              $this->contacto_fijo = $this->NM_ajax_info['param']['contacto_fijo'];
          }
          if (isset($this->NM_ajax_info['param']['contacto_nombre']))
          {
              $this->contacto_nombre = $this->NM_ajax_info['param']['contacto_nombre'];
          }
          if (isset($this->NM_ajax_info['param']['correo']))
          {
              $this->correo = $this->NM_ajax_info['param']['correo'];
          }
          if (isset($this->NM_ajax_info['param']['correo_copia']))
          {
              $this->correo_copia = $this->NM_ajax_info['param']['correo_copia'];
          }
          if (isset($this->NM_ajax_info['param']['correo_para_prueba']))
          {
              $this->correo_para_prueba = $this->NM_ajax_info['param']['correo_para_prueba'];
          }
          if (isset($this->NM_ajax_info['param']['correo_prueba']))
          {
              $this->correo_prueba = $this->NM_ajax_info['param']['correo_prueba'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['desactivar_xml_enlista']))
          {
              $this->desactivar_xml_enlista = $this->NM_ajax_info['param']['desactivar_xml_enlista'];
          }
          if (isset($this->NM_ajax_info['param']['desviar_correo_a']))
          {
              $this->desviar_correo_a = $this->NM_ajax_info['param']['desviar_correo_a'];
          }
          if (isset($this->NM_ajax_info['param']['direccion']))
          {
              $this->direccion = $this->NM_ajax_info['param']['direccion'];
          }
          if (isset($this->NM_ajax_info['param']['email_alternativo']))
          {
              $this->email_alternativo = $this->NM_ajax_info['param']['email_alternativo'];
          }
          if (isset($this->NM_ajax_info['param']['enviar_cliente']))
          {
              $this->enviar_cliente = $this->NM_ajax_info['param']['enviar_cliente'];
          }
          if (isset($this->NM_ajax_info['param']['enviar_datos_establecimiento']))
          {
              $this->enviar_datos_establecimiento = $this->NM_ajax_info['param']['enviar_datos_establecimiento'];
          }
          if (isset($this->NM_ajax_info['param']['enviar_dian']))
          {
              $this->enviar_dian = $this->NM_ajax_info['param']['enviar_dian'];
          }
          if (isset($this->NM_ajax_info['param']['enviar_documento_online']))
          {
              $this->enviar_documento_online = $this->NM_ajax_info['param']['enviar_documento_online'];
          }
          if (isset($this->NM_ajax_info['param']['head_note']))
          {
              $this->head_note = $this->NM_ajax_info['param']['head_note'];
          }
          if (isset($this->NM_ajax_info['param']['id_empresa']))
          {
              $this->id_empresa = $this->NM_ajax_info['param']['id_empresa'];
          }
          if (isset($this->NM_ajax_info['param']['informacion_adicional']))
          {
              $this->informacion_adicional = $this->NM_ajax_info['param']['informacion_adicional'];
          }
          if (isset($this->NM_ajax_info['param']['logo']))
          {
              $this->logo = $this->NM_ajax_info['param']['logo'];
          }
          if (isset($this->NM_ajax_info['param']['logo_limpa']))
          {
              $this->logo_limpa = $this->NM_ajax_info['param']['logo_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['logo_salva']))
          {
              $this->logo_salva = $this->NM_ajax_info['param']['logo_salva'];
          }
          if (isset($this->NM_ajax_info['param']['logo_ul_name']))
          {
              $this->logo_ul_name = $this->NM_ajax_info['param']['logo_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['logo_ul_type']))
          {
              $this->logo_ul_type = $this->NM_ajax_info['param']['logo_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['mensaje']))
          {
              $this->mensaje = $this->NM_ajax_info['param']['mensaje'];
          }
          if (isset($this->NM_ajax_info['param']['mensaje_nc']))
          {
              $this->mensaje_nc = $this->NM_ajax_info['param']['mensaje_nc'];
          }
          if (isset($this->NM_ajax_info['param']['modo']))
          {
              $this->modo = $this->NM_ajax_info['param']['modo'];
          }
          if (isset($this->NM_ajax_info['param']['nit']))
          {
              $this->nit = $this->NM_ajax_info['param']['nit'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
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
          if (isset($this->NM_ajax_info['param']['no_validar_mail']))
          {
              $this->no_validar_mail = $this->NM_ajax_info['param']['no_validar_mail'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_pc_red']))
          {
              $this->nombre_pc_red = $this->NM_ajax_info['param']['nombre_pc_red'];
          }
          if (isset($this->NM_ajax_info['param']['nombre_razonsocial']))
          {
              $this->nombre_razonsocial = $this->NM_ajax_info['param']['nombre_razonsocial'];
          }
          if (isset($this->NM_ajax_info['param']['observaciones']))
          {
              $this->observaciones = $this->NM_ajax_info['param']['observaciones'];
          }
          if (isset($this->NM_ajax_info['param']['pagina_web']))
          {
              $this->pagina_web = $this->NM_ajax_info['param']['pagina_web'];
          }
          if (isset($this->NM_ajax_info['param']['password_pruebas']))
          {
              $this->password_pruebas = $this->NM_ajax_info['param']['password_pruebas'];
          }
          if (isset($this->NM_ajax_info['param']['pie_pagina']))
          {
              $this->pie_pagina = $this->NM_ajax_info['param']['pie_pagina'];
          }
          if (isset($this->NM_ajax_info['param']['pie_pagina_nc']))
          {
              $this->pie_pagina_nc = $this->NM_ajax_info['param']['pie_pagina_nc'];
          }
          if (isset($this->NM_ajax_info['param']['proveedor']))
          {
              $this->proveedor = $this->NM_ajax_info['param']['proveedor'];
          }
          if (isset($this->NM_ajax_info['param']['razon_social']))
          {
              $this->razon_social = $this->NM_ajax_info['param']['razon_social'];
          }
          if (isset($this->NM_ajax_info['param']['regimen']))
          {
              $this->regimen = $this->NM_ajax_info['param']['regimen'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['serial']))
          {
              $this->serial = $this->NM_ajax_info['param']['serial'];
          }
          if (isset($this->NM_ajax_info['param']['servidor1']))
          {
              $this->servidor1 = $this->NM_ajax_info['param']['servidor1'];
          }
          if (isset($this->NM_ajax_info['param']['servidor1_pruebas']))
          {
              $this->servidor1_pruebas = $this->NM_ajax_info['param']['servidor1_pruebas'];
          }
          if (isset($this->NM_ajax_info['param']['servidor2']))
          {
              $this->servidor2 = $this->NM_ajax_info['param']['servidor2'];
          }
          if (isset($this->NM_ajax_info['param']['servidor2_pruebas']))
          {
              $this->servidor2_pruebas = $this->NM_ajax_info['param']['servidor2_pruebas'];
          }
          if (isset($this->NM_ajax_info['param']['servidor3']))
          {
              $this->servidor3 = $this->NM_ajax_info['param']['servidor3'];
          }
          if (isset($this->NM_ajax_info['param']['servidor3_pruebas']))
          {
              $this->servidor3_pruebas = $this->NM_ajax_info['param']['servidor3_pruebas'];
          }
          if (isset($this->NM_ajax_info['param']['servidor_facturas']))
          {
              $this->servidor_facturas = $this->NM_ajax_info['param']['servidor_facturas'];
          }
          if (isset($this->NM_ajax_info['param']['servidor_nc']))
          {
              $this->servidor_nc = $this->NM_ajax_info['param']['servidor_nc'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_password']))
          {
              $this->smtp_password = $this->NM_ajax_info['param']['smtp_password'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_puerto']))
          {
              $this->smtp_puerto = $this->NM_ajax_info['param']['smtp_puerto'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_servidor']))
          {
              $this->smtp_servidor = $this->NM_ajax_info['param']['smtp_servidor'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_tipo']))
          {
              $this->smtp_tipo = $this->NM_ajax_info['param']['smtp_tipo'];
          }
          if (isset($this->NM_ajax_info['param']['smtp_usuario']))
          {
              $this->smtp_usuario = $this->NM_ajax_info['param']['smtp_usuario'];
          }
          if (isset($this->NM_ajax_info['param']['sumarimpuestosdeldetalle']))
          {
              $this->sumarimpuestosdeldetalle = $this->NM_ajax_info['param']['sumarimpuestosdeldetalle'];
          }
          if (isset($this->NM_ajax_info['param']['tiempo_bouncer']))
          {
              $this->tiempo_bouncer = $this->NM_ajax_info['param']['tiempo_bouncer'];
          }
          if (isset($this->NM_ajax_info['param']['token_pruebas']))
          {
              $this->token_pruebas = $this->NM_ajax_info['param']['token_pruebas'];
          }
          if (isset($this->NM_ajax_info['param']['tokenempresa']))
          {
              $this->tokenempresa = $this->NM_ajax_info['param']['tokenempresa'];
          }
          if (isset($this->NM_ajax_info['param']['tokenpassword']))
          {
              $this->tokenpassword = $this->NM_ajax_info['param']['tokenpassword'];
          }
          if (isset($this->NM_ajax_info['param']['tomar_municipio_tns']))
          {
              $this->tomar_municipio_tns = $this->NM_ajax_info['param']['tomar_municipio_tns'];
          }
          if (isset($this->NM_ajax_info['param']['url_bouncer']))
          {
              $this->url_bouncer = $this->NM_ajax_info['param']['url_bouncer'];
          }
          if (isset($this->NM_ajax_info['param']['url_validar_licencia']))
          {
              $this->url_validar_licencia = $this->NM_ajax_info['param']['url_validar_licencia'];
          }
          if (isset($this->NM_ajax_info['param']['validar_codcliente_tns']))
          {
              $this->validar_codcliente_tns = $this->NM_ajax_info['param']['validar_codcliente_tns'];
          }
          if (isset($this->NM_ajax_info['param']['validar_correo_enlinea']))
          {
              $this->validar_correo_enlinea = $this->NM_ajax_info['param']['validar_correo_enlinea'];
          }
          if (isset($this->NM_ajax_info['param']['valortributounidad']))
          {
              $this->valortributounidad = $this->NM_ajax_info['param']['valortributounidad'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['embutida_parms']);
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
                 nm_limpa_str_form_cloud_empresas_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_cloud_empresas_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_cloud_empresas_mob']['upload_field_info']['logo'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_cloud_empresas_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(jpeg|jpg)$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '200',
          'upload_file_width'  => '200',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cloud_empresas_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_cloud_empresas_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cloud_empresas_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cloud_empresas_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_cloud_empresas_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_cloud_empresas_mob']['label'] = "Empresas";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_cloud_empresas_mob")
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
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "FACILWEB";
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


      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_img",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'fontawesomeicon'  => "",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_cloud_empresas_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_cloud_empresas_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['logo_ul_name']) && '' != $this->NM_ajax_info['param']['logo_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_field_ul_name'][$this->logo_ul_name]))
          {
              $this->NM_ajax_info['param']['logo_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_field_ul_name'][$this->logo_ul_name];
          }
          $this->logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['logo_ul_name'];
          $this->logo_scfile_name = substr($this->NM_ajax_info['param']['logo_ul_name'], 12);
          $this->logo_scfile_type = $this->NM_ajax_info['param']['logo_ul_type'];
          $this->logo_ul_name = $this->NM_ajax_info['param']['logo_ul_name'];
          $this->logo_ul_type = $this->NM_ajax_info['param']['logo_ul_type'];
      }
      elseif (isset($this->logo_ul_name) && '' != $this->logo_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_field_ul_name'][$this->logo_ul_name]))
          {
              $this->logo_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_field_ul_name'][$this->logo_ul_name];
          }
          $this->logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->logo_ul_name;
          $this->logo_scfile_name = substr($this->logo_ul_name, 12);
          $this->logo_scfile_type = $this->logo_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_cloud_empresas_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_cloud_empresas_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_cloud_empresas_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_form'];
          if (!isset($this->creado)){$this->creado = $this->nmgp_dados_form['creado'];} 
          if (!isset($this->editado)){$this->editado = $this->nmgp_dados_form['editado'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_cloud_empresas_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
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

      if (is_file($this->Ini->path_aplicacao . 'form_cloud_empresas_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_cloud_empresas_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_cloud_empresas/form_cloud_empresas_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_cloud_empresas_mob_erro.class.php"); 
      }
      $this->Erro      = new form_cloud_empresas_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao']))
         { 
             if ($this->id_empresa != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_cloud_empresas_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_cloud_empresas_mob']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_cloud_empresas_mob']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->id_empresa)) { $this->nm_limpa_alfa($this->id_empresa); }
      if (isset($this->ccnit)) { $this->nm_limpa_alfa($this->ccnit); }
      if (isset($this->nombre_razonsocial)) { $this->nm_limpa_alfa($this->nombre_razonsocial); }
      if (isset($this->celular)) { $this->nm_limpa_alfa($this->celular); }
      if (isset($this->correo)) { $this->nm_limpa_alfa($this->correo); }
      if (isset($this->codsucursal)) { $this->nm_limpa_alfa($this->codsucursal); }
      if (isset($this->cantidaddecimales)) { $this->nm_limpa_alfa($this->cantidaddecimales); }
      if (isset($this->valortributounidad)) { $this->nm_limpa_alfa($this->valortributounidad); }
      if (isset($this->email_alternativo)) { $this->nm_limpa_alfa($this->email_alternativo); }
      if (isset($this->servidor1)) { $this->nm_limpa_alfa($this->servidor1); }
      if (isset($this->servidor2)) { $this->nm_limpa_alfa($this->servidor2); }
      if (isset($this->servidor3)) { $this->nm_limpa_alfa($this->servidor3); }
      if (isset($this->tokenempresa)) { $this->nm_limpa_alfa($this->tokenempresa); }
      if (isset($this->tokenpassword)) { $this->nm_limpa_alfa($this->tokenpassword); }
      if (isset($this->servidor1_pruebas)) { $this->nm_limpa_alfa($this->servidor1_pruebas); }
      if (isset($this->servidor2_pruebas)) { $this->nm_limpa_alfa($this->servidor2_pruebas); }
      if (isset($this->servidor3_pruebas)) { $this->nm_limpa_alfa($this->servidor3_pruebas); }
      if (isset($this->token_pruebas)) { $this->nm_limpa_alfa($this->token_pruebas); }
      if (isset($this->password_pruebas)) { $this->nm_limpa_alfa($this->password_pruebas); }
      if (isset($this->modo)) { $this->nm_limpa_alfa($this->modo); }
      if (isset($this->smtp_servidor)) { $this->nm_limpa_alfa($this->smtp_servidor); }
      if (isset($this->smtp_usuario)) { $this->nm_limpa_alfa($this->smtp_usuario); }
      if (isset($this->smtp_password)) { $this->nm_limpa_alfa($this->smtp_password); }
      if (isset($this->smtp_puerto)) { $this->nm_limpa_alfa($this->smtp_puerto); }
      if (isset($this->smtp_tipo)) { $this->nm_limpa_alfa($this->smtp_tipo); }
      if (isset($this->asunto)) { $this->nm_limpa_alfa($this->asunto); }
      if (isset($this->correo_para_prueba)) { $this->nm_limpa_alfa($this->correo_para_prueba); }
      if (isset($this->contacto_nombre)) { $this->nm_limpa_alfa($this->contacto_nombre); }
      if (isset($this->contacto_cargo)) { $this->nm_limpa_alfa($this->contacto_cargo); }
      if (isset($this->contacto_correo)) { $this->nm_limpa_alfa($this->contacto_correo); }
      if (isset($this->contacto_celular)) { $this->nm_limpa_alfa($this->contacto_celular); }
      if (isset($this->contacto_fijo)) { $this->nm_limpa_alfa($this->contacto_fijo); }
      if (isset($this->servidor_facturas)) { $this->nm_limpa_alfa($this->servidor_facturas); }
      if (isset($this->correo_copia)) { $this->nm_limpa_alfa($this->correo_copia); }
      if (isset($this->direccion)) { $this->nm_limpa_alfa($this->direccion); }
      if (isset($this->ciudad)) { $this->nm_limpa_alfa($this->ciudad); }
      if (isset($this->pagina_web)) { $this->nm_limpa_alfa($this->pagina_web); }
      if (isset($this->actividad_principal)) { $this->nm_limpa_alfa($this->actividad_principal); }
      if (isset($this->regimen)) { $this->nm_limpa_alfa($this->regimen); }
      if (isset($this->desviar_correo_a)) { $this->nm_limpa_alfa($this->desviar_correo_a); }
      if (isset($this->pie_pagina)) { $this->nm_limpa_alfa($this->pie_pagina); }
      if (isset($this->pie_pagina_nc)) { $this->nm_limpa_alfa($this->pie_pagina_nc); }
      if (isset($this->servidor_nc)) { $this->nm_limpa_alfa($this->servidor_nc); }
      if (isset($this->informacion_adicional)) { $this->nm_limpa_alfa($this->informacion_adicional); }
      if (isset($this->serial)) { $this->nm_limpa_alfa($this->serial); }
      if (isset($this->nombre_pc_red)) { $this->nm_limpa_alfa($this->nombre_pc_red); }
      if (isset($this->proveedor)) { $this->nm_limpa_alfa($this->proveedor); }
      if (isset($this->enviar_dian)) { $this->nm_limpa_alfa($this->enviar_dian); }
      if (isset($this->enviar_cliente)) { $this->nm_limpa_alfa($this->enviar_cliente); }
      if (isset($this->nit)) { $this->nm_limpa_alfa($this->nit); }
      if (isset($this->razon_social)) { $this->nm_limpa_alfa($this->razon_social); }
      if (isset($this->head_note)) { $this->nm_limpa_alfa($this->head_note); }
      if (isset($this->url_validar_licencia)) { $this->nm_limpa_alfa($this->url_validar_licencia); }
      if (isset($this->url_bouncer)) { $this->nm_limpa_alfa($this->url_bouncer); }
      if (isset($this->apikey_bouncer)) { $this->nm_limpa_alfa($this->apikey_bouncer); }
      if (isset($this->tiempo_bouncer)) { $this->nm_limpa_alfa($this->tiempo_bouncer); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_empresa
      $this->field_config['id_empresa']               = array();
      $this->field_config['id_empresa']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_empresa']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_empresa']['symbol_dec'] = '';
      $this->field_config['id_empresa']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_empresa']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- smtp_puerto
      $this->field_config['smtp_puerto']               = array();
      $this->field_config['smtp_puerto']['symbol_grp'] = '';
      $this->field_config['smtp_puerto']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['smtp_puerto']['symbol_dec'] = '';
      $this->field_config['smtp_puerto']['symbol_neg'] = '-';
      $this->field_config['smtp_puerto']['format_neg'] = '2';
      //-- cantidaddecimales
      $this->field_config['cantidaddecimales']               = array();
      $this->field_config['cantidaddecimales']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cantidaddecimales']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cantidaddecimales']['symbol_dec'] = '';
      $this->field_config['cantidaddecimales']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cantidaddecimales']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- tiempo_bouncer
      $this->field_config['tiempo_bouncer']               = array();
      $this->field_config['tiempo_bouncer']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['tiempo_bouncer']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['tiempo_bouncer']['symbol_dec'] = '';
      $this->field_config['tiempo_bouncer']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['tiempo_bouncer']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- creado
      $this->field_config['creado']                 = array();
      $this->field_config['creado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['creado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['creado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['creado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'creado');
      //-- editado
      $this->field_config['editado']                 = array();
      $this->field_config['editado']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['editado']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['editado']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['editado']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'editado');
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
          if ('validate_id_empresa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_empresa');
          }
          if ('validate_ccnit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ccnit');
          }
          if ('validate_nombre_razonsocial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_razonsocial');
          }
          if ('validate_serial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'serial');
          }
          if ('validate_activo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'activo');
          }
          if ('validate_nit' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nit');
          }
          if ('validate_razon_social' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'razon_social');
          }
          if ('validate_celular' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'celular');
          }
          if ('validate_correo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'correo');
          }
          if ('validate_codsucursal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'codsucursal');
          }
          if ('validate_direccion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'direccion');
          }
          if ('validate_ciudad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'ciudad');
          }
          if ('validate_pagina_web' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pagina_web');
          }
          if ('validate_actividad_principal' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'actividad_principal');
          }
          if ('validate_regimen' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regimen');
          }
          if ('validate_observaciones' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observaciones');
          }
          if ('validate_proveedor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proveedor');
          }
          if ('validate_modo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'modo');
          }
          if ('validate_enviar_dian' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enviar_dian');
          }
          if ('validate_enviar_cliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enviar_cliente');
          }
          if ('validate_servidor1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor1');
          }
          if ('validate_servidor2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor2');
          }
          if ('validate_servidor3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor3');
          }
          if ('validate_tokenempresa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tokenempresa');
          }
          if ('validate_tokenpassword' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tokenpassword');
          }
          if ('validate_servidor1_pruebas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor1_pruebas');
          }
          if ('validate_servidor2_pruebas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor2_pruebas');
          }
          if ('validate_servidor3_pruebas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor3_pruebas');
          }
          if ('validate_token_pruebas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'token_pruebas');
          }
          if ('validate_password_pruebas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'password_pruebas');
          }
          if ('validate_enviar_documento_online' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enviar_documento_online');
          }
          if ('validate_smtp_tipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_tipo');
          }
          if ('validate_smtp_servidor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_servidor');
          }
          if ('validate_smtp_puerto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_puerto');
          }
          if ('validate_smtp_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_usuario');
          }
          if ('validate_smtp_password' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'smtp_password');
          }
          if ('validate_contacto_nombre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contacto_nombre');
          }
          if ('validate_contacto_cargo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contacto_cargo');
          }
          if ('validate_contacto_correo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contacto_correo');
          }
          if ('validate_contacto_celular' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contacto_celular');
          }
          if ('validate_contacto_fijo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contacto_fijo');
          }
          if ('validate_logo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'logo');
          }
          if ('validate_asunto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'asunto');
          }
          if ('validate_mensaje' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mensaje');
          }
          if ('validate_head_note' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'head_note');
          }
          if ('validate_pie_pagina' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pie_pagina');
          }
          if ('validate_mensaje_nc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mensaje_nc');
          }
          if ('validate_pie_pagina_nc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pie_pagina_nc');
          }
          if ('validate_servidor_facturas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor_facturas');
          }
          if ('validate_servidor_nc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servidor_nc');
          }
          if ('validate_correo_para_prueba' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'correo_para_prueba');
          }
          if ('validate_correo_prueba' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'correo_prueba');
          }
          if ('validate_enviar_datos_establecimiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enviar_datos_establecimiento');
          }
          if ('validate_nombre_pc_red' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombre_pc_red');
          }
          if ('validate_sumarimpuestosdeldetalle' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sumarimpuestosdeldetalle');
          }
          if ('validate_cantidaddecimales' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cantidaddecimales');
          }
          if ('validate_valortributounidad' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valortributounidad');
          }
          if ('validate_conf_auto_tercero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'conf_auto_tercero');
          }
          if ('validate_no_validar_mail' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'no_validar_mail');
          }
          if ('validate_email_alternativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email_alternativo');
          }
          if ('validate_desviar_correo_a' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'desviar_correo_a');
          }
          if ('validate_correo_copia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'correo_copia');
          }
          if ('validate_informacion_adicional' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'informacion_adicional');
          }
          if ('validate_tomar_municipio_tns' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tomar_municipio_tns');
          }
          if ('validate_validar_codcliente_tns' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'validar_codcliente_tns');
          }
          if ('validate_desactivar_xml_enlista' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'desactivar_xml_enlista');
          }
          if ('validate_validar_correo_enlinea' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'validar_correo_enlinea');
          }
          if ('validate_url_bouncer' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'url_bouncer');
          }
          if ('validate_apikey_bouncer' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'apikey_bouncer');
          }
          if ('validate_tiempo_bouncer' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tiempo_bouncer');
          }
          if ('validate_url_validar_licencia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'url_validar_licencia');
          }
          form_cloud_empresas_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->conf_auto_tercero))
          {
              $x = 0; 
              $this->conf_auto_tercero_1 = $this->conf_auto_tercero;
              $this->conf_auto_tercero = ""; 
              if ($this->conf_auto_tercero_1 != "") 
              { 
                  foreach ($this->conf_auto_tercero_1 as $dados_conf_auto_tercero_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->conf_auto_tercero .= ";";
                      } 
                      $this->conf_auto_tercero .= $dados_conf_auto_tercero_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->no_validar_mail))
          {
              $x = 0; 
              $this->no_validar_mail_1 = $this->no_validar_mail;
              $this->no_validar_mail = ""; 
              if ($this->no_validar_mail_1 != "") 
              { 
                  foreach ($this->no_validar_mail_1 as $dados_no_validar_mail_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->no_validar_mail .= ";";
                      } 
                      $this->no_validar_mail .= $dados_no_validar_mail_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->enviar_documento_online))
          {
              $x = 0; 
              $this->enviar_documento_online_1 = $this->enviar_documento_online;
              $this->enviar_documento_online = ""; 
              if ($this->enviar_documento_online_1 != "") 
              { 
                  foreach ($this->enviar_documento_online_1 as $dados_enviar_documento_online_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->enviar_documento_online .= ";";
                      } 
                      $this->enviar_documento_online .= $dados_enviar_documento_online_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->sumarimpuestosdeldetalle))
          {
              $x = 0; 
              $this->sumarimpuestosdeldetalle_1 = $this->sumarimpuestosdeldetalle;
              $this->sumarimpuestosdeldetalle = ""; 
              if ($this->sumarimpuestosdeldetalle_1 != "") 
              { 
                  foreach ($this->sumarimpuestosdeldetalle_1 as $dados_sumarimpuestosdeldetalle_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->sumarimpuestosdeldetalle .= ";";
                      } 
                      $this->sumarimpuestosdeldetalle .= $dados_sumarimpuestosdeldetalle_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->tomar_municipio_tns))
          {
              $x = 0; 
              $this->tomar_municipio_tns_1 = $this->tomar_municipio_tns;
              $this->tomar_municipio_tns = ""; 
              if ($this->tomar_municipio_tns_1 != "") 
              { 
                  foreach ($this->tomar_municipio_tns_1 as $dados_tomar_municipio_tns_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->tomar_municipio_tns .= ";";
                      } 
                      $this->tomar_municipio_tns .= $dados_tomar_municipio_tns_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->validar_codcliente_tns))
          {
              $x = 0; 
              $this->validar_codcliente_tns_1 = $this->validar_codcliente_tns;
              $this->validar_codcliente_tns = ""; 
              if ($this->validar_codcliente_tns_1 != "") 
              { 
                  foreach ($this->validar_codcliente_tns_1 as $dados_validar_codcliente_tns_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->validar_codcliente_tns .= ";";
                      } 
                      $this->validar_codcliente_tns .= $dados_validar_codcliente_tns_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->desactivar_xml_enlista))
          {
              $x = 0; 
              $this->desactivar_xml_enlista_1 = $this->desactivar_xml_enlista;
              $this->desactivar_xml_enlista = ""; 
              if ($this->desactivar_xml_enlista_1 != "") 
              { 
                  foreach ($this->desactivar_xml_enlista_1 as $dados_desactivar_xml_enlista_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->desactivar_xml_enlista .= ";";
                      } 
                      $this->desactivar_xml_enlista .= $dados_desactivar_xml_enlista_1;
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
          if (is_array($this->enviar_datos_establecimiento))
          {
              $x = 0; 
              $this->enviar_datos_establecimiento_1 = $this->enviar_datos_establecimiento;
              $this->enviar_datos_establecimiento = ""; 
              if ($this->enviar_datos_establecimiento_1 != "") 
              { 
                  foreach ($this->enviar_datos_establecimiento_1 as $dados_enviar_datos_establecimiento_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->enviar_datos_establecimiento .= ";";
                      } 
                      $this->enviar_datos_establecimiento .= $dados_enviar_datos_establecimiento_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_cloud_empresas_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_cloud_empresas_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_cloud_empresas_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_cloud_empresas_mob_pack_ajax_response();
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
          form_cloud_empresas_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_cloud_empresas_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Empresas") ?></TITLE>
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
<form name="Fdown" method="get" action="form_cloud_empresas_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_cloud_empresas_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_cloud_empresas_mob.php" target="_self" style="display: none"> 
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
           case 'id_empresa':
               return "Id Empresa";
               break;
           case 'ccnit':
               return "Código Empresa";
               break;
           case 'nombre_razonsocial':
               return "Nombre para mostrar";
               break;
           case 'serial':
               return "Serial";
               break;
           case 'activo':
               return "Activo";
               break;
           case 'nit':
               return "CC/NIT";
               break;
           case 'razon_social':
               return "Nombre/Razón Social";
               break;
           case 'celular':
               return "Tel/Cel";
               break;
           case 'correo':
               return "Correo";
               break;
           case 'codsucursal':
               return "Codigo Establecimiento";
               break;
           case 'direccion':
               return "Direccion";
               break;
           case 'ciudad':
               return "Ciudad";
               break;
           case 'pagina_web':
               return "Pagina Web";
               break;
           case 'actividad_principal':
               return "Actividad Principal";
               break;
           case 'regimen':
               return "Regimen";
               break;
           case 'observaciones':
               return "Observaciones";
               break;
           case 'proveedor':
               return "Proveedor";
               break;
           case 'modo':
               return "Modo";
               break;
           case 'enviar_dian':
               return "Enviar  a la DIAN";
               break;
           case 'enviar_cliente':
               return "Enviar documento al cliente";
               break;
           case 'servidor1':
               return "Servidor 1";
               break;
           case 'servidor2':
               return "Servidor 2";
               break;
           case 'servidor3':
               return "Servidor 3";
               break;
           case 'tokenempresa':
               return "Token Empresa";
               break;
           case 'tokenpassword':
               return "Token Password";
               break;
           case 'servidor1_pruebas':
               return "Servidor 1 Pruebas";
               break;
           case 'servidor2_pruebas':
               return "Servidor 2 Pruebas";
               break;
           case 'servidor3_pruebas':
               return "Servidor 3 Pruebas";
               break;
           case 'token_pruebas':
               return "Token Pruebas";
               break;
           case 'password_pruebas':
               return "Password Pruebas";
               break;
           case 'enviar_documento_online':
               return "Enviar Documento Online";
               break;
           case 'smtp_tipo':
               return "Tipo";
               break;
           case 'smtp_servidor':
               return "Servidor";
               break;
           case 'smtp_puerto':
               return "Puerto";
               break;
           case 'smtp_usuario':
               return "Usuario";
               break;
           case 'smtp_password':
               return "Contraseña";
               break;
           case 'contacto_nombre':
               return "Nombre Contacto";
               break;
           case 'contacto_cargo':
               return "Cargo";
               break;
           case 'contacto_correo':
               return "Correo";
               break;
           case 'contacto_celular':
               return "Tel/Cel";
               break;
           case 'contacto_fijo':
               return "Teléfono Fijo";
               break;
           case 'logo':
               return "Logo";
               break;
           case 'asunto':
               return "Asunto";
               break;
           case 'mensaje':
               return "Mensaje correo factura";
               break;
           case 'head_note':
               return "Cabecera";
               break;
           case 'pie_pagina':
               return "Pie página factura";
               break;
           case 'mensaje_nc':
               return "Mensaje NC";
               break;
           case 'pie_pagina_nc':
               return "Pie página NC";
               break;
           case 'servidor_facturas':
               return "Servidor Facturas";
               break;
           case 'servidor_nc':
               return "Servidor Notas Crédito";
               break;
           case 'correo_para_prueba':
               return "Correo para Prueba";
               break;
           case 'correo_prueba':
               return "Mandar correo de prueba";
               break;
           case 'enviar_datos_establecimiento':
               return "Enviar Datos Establecimiento";
               break;
           case 'nombre_pc_red':
               return "Nombre PC red";
               break;
           case 'sumarimpuestosdeldetalle':
               return "Sumar impuestos del detalle";
               break;
           case 'cantidaddecimales':
               return "Cantidad Decimales";
               break;
           case 'valortributounidad':
               return "Valor Tributo Unidad";
               break;
           case 'conf_auto_tercero':
               return "Configuracion auto tercero";
               break;
           case 'no_validar_mail':
               return "Correo alternativo";
               break;
           case 'email_alternativo':
               return "Correo alternativo";
               break;
           case 'desviar_correo_a':
               return "Desviar correo a";
               break;
           case 'correo_copia':
               return "Enviar copia a";
               break;
           case 'informacion_adicional':
               return "Información Adicional";
               break;
           case 'tomar_municipio_tns':
               return "Tomar el municipio de TNS";
               break;
           case 'validar_codcliente_tns':
               return "Validar Cliente en TNS";
               break;
           case 'desactivar_xml_enlista':
               return "Desactivar XML en lista";
               break;
           case 'validar_correo_enlinea':
               return "Validar Correo En Línea";
               break;
           case 'url_bouncer':
               return "URL Bouncer";
               break;
           case 'apikey_bouncer':
               return "Apikey Bouncer";
               break;
           case 'tiempo_bouncer':
               return "Tiempo Bouncer";
               break;
           case 'url_validar_licencia':
               return "Url Validar Licencia";
               break;
           case 'creado':
               return "Creado";
               break;
           case 'editado':
               return "Editado";
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
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_cloud_empresas_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_cloud_empresas_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_cloud_empresas_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_cloud_empresas_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_empresa' == $filtro)
        $this->ValidateField_id_empresa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ccnit' == $filtro)
        $this->ValidateField_ccnit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nombre_razonsocial' == $filtro)
        $this->ValidateField_nombre_razonsocial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'serial' == $filtro)
        $this->ValidateField_serial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'activo' == $filtro)
        $this->ValidateField_activo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nit' == $filtro)
        $this->ValidateField_nit($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'razon_social' == $filtro)
        $this->ValidateField_razon_social($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'celular' == $filtro)
        $this->ValidateField_celular($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'correo' == $filtro)
        $this->ValidateField_correo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'codsucursal' == $filtro)
        $this->ValidateField_codsucursal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'direccion' == $filtro)
        $this->ValidateField_direccion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'ciudad' == $filtro)
        $this->ValidateField_ciudad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pagina_web' == $filtro)
        $this->ValidateField_pagina_web($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'actividad_principal' == $filtro)
        $this->ValidateField_actividad_principal($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'regimen' == $filtro)
        $this->ValidateField_regimen($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observaciones' == $filtro)
        $this->ValidateField_observaciones($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'proveedor' == $filtro)
        $this->ValidateField_proveedor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'modo' == $filtro)
        $this->ValidateField_modo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'enviar_dian' == $filtro)
        $this->ValidateField_enviar_dian($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'enviar_cliente' == $filtro)
        $this->ValidateField_enviar_cliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor1' == $filtro)
        $this->ValidateField_servidor1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor2' == $filtro)
        $this->ValidateField_servidor2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor3' == $filtro)
        $this->ValidateField_servidor3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tokenempresa' == $filtro)
        $this->ValidateField_tokenempresa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tokenpassword' == $filtro)
        $this->ValidateField_tokenpassword($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor1_pruebas' == $filtro)
        $this->ValidateField_servidor1_pruebas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor2_pruebas' == $filtro)
        $this->ValidateField_servidor2_pruebas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor3_pruebas' == $filtro)
        $this->ValidateField_servidor3_pruebas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'token_pruebas' == $filtro)
        $this->ValidateField_token_pruebas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'password_pruebas' == $filtro)
        $this->ValidateField_password_pruebas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'enviar_documento_online' == $filtro)
        $this->ValidateField_enviar_documento_online($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'smtp_tipo' == $filtro)
        $this->ValidateField_smtp_tipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'smtp_servidor' == $filtro)
        $this->ValidateField_smtp_servidor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'smtp_puerto' == $filtro)
        $this->ValidateField_smtp_puerto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'smtp_usuario' == $filtro)
        $this->ValidateField_smtp_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'smtp_password' == $filtro)
        $this->ValidateField_smtp_password($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contacto_nombre' == $filtro)
        $this->ValidateField_contacto_nombre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contacto_cargo' == $filtro)
        $this->ValidateField_contacto_cargo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contacto_correo' == $filtro)
        $this->ValidateField_contacto_correo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contacto_celular' == $filtro)
        $this->ValidateField_contacto_celular($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contacto_fijo' == $filtro)
        $this->ValidateField_contacto_fijo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'logo' == $filtro)
        $this->ValidateField_logo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'asunto' == $filtro)
        $this->ValidateField_asunto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'mensaje' == $filtro)
        $this->ValidateField_mensaje($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'head_note' == $filtro)
        $this->ValidateField_head_note($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pie_pagina' == $filtro)
        $this->ValidateField_pie_pagina($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'mensaje_nc' == $filtro)
        $this->ValidateField_mensaje_nc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pie_pagina_nc' == $filtro)
        $this->ValidateField_pie_pagina_nc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor_facturas' == $filtro)
        $this->ValidateField_servidor_facturas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servidor_nc' == $filtro)
        $this->ValidateField_servidor_nc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'correo_para_prueba' == $filtro)
        $this->ValidateField_correo_para_prueba($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'correo_prueba' == $filtro)
        $this->ValidateField_correo_prueba($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'enviar_datos_establecimiento' == $filtro)
        $this->ValidateField_enviar_datos_establecimiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nombre_pc_red' == $filtro)
        $this->ValidateField_nombre_pc_red($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sumarimpuestosdeldetalle' == $filtro)
        $this->ValidateField_sumarimpuestosdeldetalle($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cantidaddecimales' == $filtro)
        $this->ValidateField_cantidaddecimales($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valortributounidad' == $filtro)
        $this->ValidateField_valortributounidad($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'conf_auto_tercero' == $filtro)
        $this->ValidateField_conf_auto_tercero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'no_validar_mail' == $filtro)
        $this->ValidateField_no_validar_mail($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'email_alternativo' == $filtro)
        $this->ValidateField_email_alternativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'desviar_correo_a' == $filtro)
        $this->ValidateField_desviar_correo_a($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'correo_copia' == $filtro)
        $this->ValidateField_correo_copia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'informacion_adicional' == $filtro)
        $this->ValidateField_informacion_adicional($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tomar_municipio_tns' == $filtro)
        $this->ValidateField_tomar_municipio_tns($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'validar_codcliente_tns' == $filtro)
        $this->ValidateField_validar_codcliente_tns($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'desactivar_xml_enlista' == $filtro)
        $this->ValidateField_desactivar_xml_enlista($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'validar_correo_enlinea' == $filtro)
        $this->ValidateField_validar_correo_enlinea($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'url_bouncer' == $filtro)
        $this->ValidateField_url_bouncer($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'apikey_bouncer' == $filtro)
        $this->ValidateField_apikey_bouncer($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tiempo_bouncer' == $filtro)
        $this->ValidateField_tiempo_bouncer($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'url_validar_licencia' == $filtro)
        $this->ValidateField_url_validar_licencia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
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

    function ValidateField_id_empresa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id_empresa === "" || is_null($this->id_empresa))  
      { 
          $this->id_empresa = 0;
      } 
      nm_limpa_numero($this->id_empresa, $this->field_config['id_empresa']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id_empresa != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_empresa) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id Empresa: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_empresa']))
                  {
                      $Campos_Erros['id_empresa'] = array();
                  }
                  $Campos_Erros['id_empresa'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_empresa']) || !is_array($this->NM_ajax_info['errList']['id_empresa']))
                  {
                      $this->NM_ajax_info['errList']['id_empresa'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_empresa'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_empresa, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Id Empresa; " ; 
                  if (!isset($Campos_Erros['id_empresa']))
                  {
                      $Campos_Erros['id_empresa'] = array();
                  }
                  $Campos_Erros['id_empresa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_empresa']) || !is_array($this->NM_ajax_info['errList']['id_empresa']))
                  {
                      $this->NM_ajax_info['errList']['id_empresa'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_empresa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id_empresa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id_empresa

    function ValidateField_ccnit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->ccnit = sc_strtoupper($this->ccnit); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ccnit) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Código Empresa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ccnit']))
              {
                  $Campos_Erros['ccnit'] = array();
              }
              $Campos_Erros['ccnit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ccnit']) || !is_array($this->NM_ajax_info['errList']['ccnit']))
              {
                  $this->NM_ajax_info['errList']['ccnit'] = array();
              }
              $this->NM_ajax_info['errList']['ccnit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789.-";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->ccnit ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->ccnit, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Código Empresa " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['ccnit']))
              {
                  $Campos_Erros['ccnit'] = array();
              }
              $Campos_Erros['ccnit'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['ccnit']) || !is_array($this->NM_ajax_info['errList']['ccnit']))
              {
                  $this->NM_ajax_info['errList']['ccnit'] = array();
              }
              $this->NM_ajax_info['errList']['ccnit'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ccnit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ccnit

    function ValidateField_nombre_razonsocial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre_razonsocial = sc_strtoupper($this->nombre_razonsocial); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_razonsocial) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre para mostrar " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_razonsocial']))
              {
                  $Campos_Erros['nombre_razonsocial'] = array();
              }
              $Campos_Erros['nombre_razonsocial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_razonsocial']) || !is_array($this->NM_ajax_info['errList']['nombre_razonsocial']))
              {
                  $this->NM_ajax_info['errList']['nombre_razonsocial'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_razonsocial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_razonsocial';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_razonsocial

    function ValidateField_serial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->serial) > 100) 
          { 
              $hasError = true;
              $Campos_Crit .= "Serial " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['serial']))
              {
                  $Campos_Erros['serial'] = array();
              }
              $Campos_Erros['serial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['serial']) || !is_array($this->NM_ajax_info['errList']['serial']))
              {
                  $this->NM_ajax_info['errList']['serial'] = array();
              }
              $this->NM_ajax_info['errList']['serial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
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

    function ValidateField_activo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->activo == "" && $this->nmgp_opcao != "excluir")
      { 
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

    function ValidateField_nit(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nit) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "CC/NIT " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nit']))
              {
                  $Campos_Erros['nit'] = array();
              }
              $Campos_Erros['nit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nit']) || !is_array($this->NM_ajax_info['errList']['nit']))
              {
                  $this->NM_ajax_info['errList']['nit'] = array();
              }
              $this->NM_ajax_info['errList']['nit'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nit ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nit, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "CC/NIT " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['nit']))
              {
                  $Campos_Erros['nit'] = array();
              }
              $Campos_Erros['nit'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nit']) || !is_array($this->NM_ajax_info['errList']['nit']))
              {
                  $this->NM_ajax_info['errList']['nit'] = array();
              }
              $this->NM_ajax_info['errList']['nit'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nit';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nit

    function ValidateField_razon_social(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->razon_social = sc_strtoupper($this->razon_social); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->razon_social) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre/Razón Social " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['razon_social']))
              {
                  $Campos_Erros['razon_social'] = array();
              }
              $Campos_Erros['razon_social'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['razon_social']) || !is_array($this->NM_ajax_info['errList']['razon_social']))
              {
                  $this->NM_ajax_info['errList']['razon_social'] = array();
              }
              $this->NM_ajax_info['errList']['razon_social'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'razon_social';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_razon_social

    function ValidateField_celular(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->celular = sc_strtoupper($this->celular); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->celular) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tel/Cel " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['celular']))
              {
                  $Campos_Erros['celular'] = array();
              }
              $Campos_Erros['celular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['celular']) || !is_array($this->NM_ajax_info['errList']['celular']))
              {
                  $this->NM_ajax_info['errList']['celular'] = array();
              }
              $this->NM_ajax_info['errList']['celular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789Ç -EXT()";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->celular ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->celular, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tel/Cel " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['celular']))
              {
                  $Campos_Erros['celular'] = array();
              }
              $Campos_Erros['celular'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['celular']) || !is_array($this->NM_ajax_info['errList']['celular']))
              {
                  $this->NM_ajax_info['errList']['celular'] = array();
              }
              $this->NM_ajax_info['errList']['celular'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'celular';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_celular

    function ValidateField_correo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->correo = sc_strtolower($this->correo); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->correo) > 90) 
          { 
              $hasError = true;
              $Campos_Crit .= "Correo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['correo']))
              {
                  $Campos_Erros['correo'] = array();
              }
              $Campos_Erros['correo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['correo']) || !is_array($this->NM_ajax_info['errList']['correo']))
              {
                  $this->NM_ajax_info['errList']['correo'] = array();
              }
              $this->NM_ajax_info['errList']['correo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 90 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'correo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_correo

    function ValidateField_codsucursal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->codsucursal) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Codigo Establecimiento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['codsucursal']))
              {
                  $Campos_Erros['codsucursal'] = array();
              }
              $Campos_Erros['codsucursal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['codsucursal']) || !is_array($this->NM_ajax_info['errList']['codsucursal']))
              {
                  $this->NM_ajax_info['errList']['codsucursal'] = array();
              }
              $this->NM_ajax_info['errList']['codsucursal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'codsucursal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_codsucursal

    function ValidateField_direccion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->direccion = sc_strtoupper($this->direccion); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->direccion) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Direccion " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['direccion']))
              {
                  $Campos_Erros['direccion'] = array();
              }
              $Campos_Erros['direccion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['direccion']) || !is_array($this->NM_ajax_info['errList']['direccion']))
              {
                  $this->NM_ajax_info['errList']['direccion'] = array();
              }
              $this->NM_ajax_info['errList']['direccion'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'direccion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_direccion

    function ValidateField_ciudad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->ciudad = sc_strtoupper($this->ciudad); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->ciudad) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Ciudad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['ciudad']))
              {
                  $Campos_Erros['ciudad'] = array();
              }
              $Campos_Erros['ciudad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['ciudad']) || !is_array($this->NM_ajax_info['errList']['ciudad']))
              {
                  $this->NM_ajax_info['errList']['ciudad'] = array();
              }
              $this->NM_ajax_info['errList']['ciudad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'ciudad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_ciudad

    function ValidateField_pagina_web(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->pagina_web = sc_strtolower($this->pagina_web); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pagina_web) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Pagina Web " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pagina_web']))
              {
                  $Campos_Erros['pagina_web'] = array();
              }
              $Campos_Erros['pagina_web'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pagina_web']) || !is_array($this->NM_ajax_info['errList']['pagina_web']))
              {
                  $this->NM_ajax_info['errList']['pagina_web'] = array();
              }
              $this->NM_ajax_info['errList']['pagina_web'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pagina_web';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pagina_web

    function ValidateField_actividad_principal(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->actividad_principal = sc_strtoupper($this->actividad_principal); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->actividad_principal) > 10) 
          { 
              $hasError = true;
              $Campos_Crit .= "Actividad Principal " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['actividad_principal']))
              {
                  $Campos_Erros['actividad_principal'] = array();
              }
              $Campos_Erros['actividad_principal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['actividad_principal']) || !is_array($this->NM_ajax_info['errList']['actividad_principal']))
              {
                  $this->NM_ajax_info['errList']['actividad_principal'] = array();
              }
              $this->NM_ajax_info['errList']['actividad_principal'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 10 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->actividad_principal ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->actividad_principal, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Actividad Principal " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['actividad_principal']))
              {
                  $Campos_Erros['actividad_principal'] = array();
              }
              $Campos_Erros['actividad_principal'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['actividad_principal']) || !is_array($this->NM_ajax_info['errList']['actividad_principal']))
              {
                  $this->NM_ajax_info['errList']['actividad_principal'] = array();
              }
              $this->NM_ajax_info['errList']['actividad_principal'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'actividad_principal';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_actividad_principal

    function ValidateField_regimen(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->regimen == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'regimen';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_regimen

    function ValidateField_observaciones(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->observaciones))
      {
          $this->observaciones = NM_conv_charset($this->observaciones, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->observaciones = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->observaciones);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->observaciones) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'observaciones';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_observaciones

    function ValidateField_proveedor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->proveedor == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'proveedor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_proveedor

    function ValidateField_modo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->modo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'modo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_modo

    function ValidateField_enviar_dian(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->enviar_dian == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->enviar_dian === "" || is_null($this->enviar_dian))  
      { 
          $this->enviar_dian = 0;
          $this->sc_force_zero[] = 'enviar_dian';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enviar_dian';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enviar_dian

    function ValidateField_enviar_cliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->enviar_cliente == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->enviar_cliente === "" || is_null($this->enviar_cliente))  
      { 
          $this->enviar_cliente = 0;
          $this->sc_force_zero[] = 'enviar_cliente';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enviar_cliente';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enviar_cliente

    function ValidateField_servidor1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor1) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor 1 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor1']))
              {
                  $Campos_Erros['servidor1'] = array();
              }
              $Campos_Erros['servidor1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor1']) || !is_array($this->NM_ajax_info['errList']['servidor1']))
              {
                  $this->NM_ajax_info['errList']['servidor1'] = array();
              }
              $this->NM_ajax_info['errList']['servidor1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor1';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor1

    function ValidateField_servidor2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor2) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor 2 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor2']))
              {
                  $Campos_Erros['servidor2'] = array();
              }
              $Campos_Erros['servidor2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor2']) || !is_array($this->NM_ajax_info['errList']['servidor2']))
              {
                  $this->NM_ajax_info['errList']['servidor2'] = array();
              }
              $this->NM_ajax_info['errList']['servidor2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor2';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor2

    function ValidateField_servidor3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor3) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor 3 " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor3']))
              {
                  $Campos_Erros['servidor3'] = array();
              }
              $Campos_Erros['servidor3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor3']) || !is_array($this->NM_ajax_info['errList']['servidor3']))
              {
                  $this->NM_ajax_info['errList']['servidor3'] = array();
              }
              $this->NM_ajax_info['errList']['servidor3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor3';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor3

    function ValidateField_tokenempresa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tokenempresa) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Token Empresa " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tokenempresa']))
              {
                  $Campos_Erros['tokenempresa'] = array();
              }
              $Campos_Erros['tokenempresa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tokenempresa']) || !is_array($this->NM_ajax_info['errList']['tokenempresa']))
              {
                  $this->NM_ajax_info['errList']['tokenempresa'] = array();
              }
              $this->NM_ajax_info['errList']['tokenempresa'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tokenempresa';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tokenempresa

    function ValidateField_tokenpassword(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tokenpassword) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Token Password " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tokenpassword']))
              {
                  $Campos_Erros['tokenpassword'] = array();
              }
              $Campos_Erros['tokenpassword'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tokenpassword']) || !is_array($this->NM_ajax_info['errList']['tokenpassword']))
              {
                  $this->NM_ajax_info['errList']['tokenpassword'] = array();
              }
              $this->NM_ajax_info['errList']['tokenpassword'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tokenpassword';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tokenpassword

    function ValidateField_servidor1_pruebas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor1_pruebas) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor 1 Pruebas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor1_pruebas']))
              {
                  $Campos_Erros['servidor1_pruebas'] = array();
              }
              $Campos_Erros['servidor1_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor1_pruebas']) || !is_array($this->NM_ajax_info['errList']['servidor1_pruebas']))
              {
                  $this->NM_ajax_info['errList']['servidor1_pruebas'] = array();
              }
              $this->NM_ajax_info['errList']['servidor1_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor1_pruebas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor1_pruebas

    function ValidateField_servidor2_pruebas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor2_pruebas) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor 2 Pruebas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor2_pruebas']))
              {
                  $Campos_Erros['servidor2_pruebas'] = array();
              }
              $Campos_Erros['servidor2_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor2_pruebas']) || !is_array($this->NM_ajax_info['errList']['servidor2_pruebas']))
              {
                  $this->NM_ajax_info['errList']['servidor2_pruebas'] = array();
              }
              $this->NM_ajax_info['errList']['servidor2_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor2_pruebas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor2_pruebas

    function ValidateField_servidor3_pruebas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor3_pruebas) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor 3 Pruebas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor3_pruebas']))
              {
                  $Campos_Erros['servidor3_pruebas'] = array();
              }
              $Campos_Erros['servidor3_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor3_pruebas']) || !is_array($this->NM_ajax_info['errList']['servidor3_pruebas']))
              {
                  $this->NM_ajax_info['errList']['servidor3_pruebas'] = array();
              }
              $this->NM_ajax_info['errList']['servidor3_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor3_pruebas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor3_pruebas

    function ValidateField_token_pruebas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->token_pruebas) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Token Pruebas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['token_pruebas']))
              {
                  $Campos_Erros['token_pruebas'] = array();
              }
              $Campos_Erros['token_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['token_pruebas']) || !is_array($this->NM_ajax_info['errList']['token_pruebas']))
              {
                  $this->NM_ajax_info['errList']['token_pruebas'] = array();
              }
              $this->NM_ajax_info['errList']['token_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'token_pruebas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_token_pruebas

    function ValidateField_password_pruebas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->password_pruebas) > 150) 
          { 
              $hasError = true;
              $Campos_Crit .= "Password Pruebas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['password_pruebas']))
              {
                  $Campos_Erros['password_pruebas'] = array();
              }
              $Campos_Erros['password_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['password_pruebas']) || !is_array($this->NM_ajax_info['errList']['password_pruebas']))
              {
                  $this->NM_ajax_info['errList']['password_pruebas'] = array();
              }
              $this->NM_ajax_info['errList']['password_pruebas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 150 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'password_pruebas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_password_pruebas

    function ValidateField_enviar_documento_online(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->enviar_documento_online == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->enviar_documento_online = "NO";
      } 
      else 
      { 
          if (is_array($this->enviar_documento_online))
          {
              $x = 0; 
              $this->enviar_documento_online_1 = array(); 
              foreach ($this->enviar_documento_online as $ind => $dados_enviar_documento_online_1 ) 
              {
                  if ($dados_enviar_documento_online_1 != "") 
                  {
                      $this->enviar_documento_online_1[] = $dados_enviar_documento_online_1;
                  } 
              } 
              $this->enviar_documento_online = ""; 
              foreach ($this->enviar_documento_online_1 as $dados_enviar_documento_online_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->enviar_documento_online .= ";";
                   } 
                   $this->enviar_documento_online .= $dados_enviar_documento_online_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enviar_documento_online';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enviar_documento_online

    function ValidateField_smtp_tipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->smtp_tipo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_tipo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_tipo

    function ValidateField_smtp_servidor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->smtp_servidor = sc_strtolower($this->smtp_servidor); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_servidor) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_servidor']))
              {
                  $Campos_Erros['smtp_servidor'] = array();
              }
              $Campos_Erros['smtp_servidor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_servidor']) || !is_array($this->NM_ajax_info['errList']['smtp_servidor']))
              {
                  $this->NM_ajax_info['errList']['smtp_servidor'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_servidor'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_servidor';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_servidor

    function ValidateField_smtp_puerto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->smtp_puerto === "" || is_null($this->smtp_puerto))  
      { 
          $this->smtp_puerto = 0;
          $this->sc_force_zero[] = 'smtp_puerto';
      } 
      nm_limpa_numero($this->smtp_puerto, $this->field_config['smtp_puerto']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->smtp_puerto != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->smtp_puerto) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Puerto: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['smtp_puerto']))
                  {
                      $Campos_Erros['smtp_puerto'] = array();
                  }
                  $Campos_Erros['smtp_puerto'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['smtp_puerto']) || !is_array($this->NM_ajax_info['errList']['smtp_puerto']))
                  {
                      $this->NM_ajax_info['errList']['smtp_puerto'] = array();
                  }
                  $this->NM_ajax_info['errList']['smtp_puerto'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->smtp_puerto, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Puerto; " ; 
                  if (!isset($Campos_Erros['smtp_puerto']))
                  {
                      $Campos_Erros['smtp_puerto'] = array();
                  }
                  $Campos_Erros['smtp_puerto'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['smtp_puerto']) || !is_array($this->NM_ajax_info['errList']['smtp_puerto']))
                  {
                      $this->NM_ajax_info['errList']['smtp_puerto'] = array();
                  }
                  $this->NM_ajax_info['errList']['smtp_puerto'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_puerto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_puerto

    function ValidateField_smtp_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->smtp_usuario = sc_strtolower($this->smtp_usuario); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_usuario) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Usuario " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_usuario']))
              {
                  $Campos_Erros['smtp_usuario'] = array();
              }
              $Campos_Erros['smtp_usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_usuario']) || !is_array($this->NM_ajax_info['errList']['smtp_usuario']))
              {
                  $this->NM_ajax_info['errList']['smtp_usuario'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_usuario';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_usuario

    function ValidateField_smtp_password(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->smtp_password = sc_strtolower($this->smtp_password); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->smtp_password) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Contraseña " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['smtp_password']))
              {
                  $Campos_Erros['smtp_password'] = array();
              }
              $Campos_Erros['smtp_password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['smtp_password']) || !is_array($this->NM_ajax_info['errList']['smtp_password']))
              {
                  $this->NM_ajax_info['errList']['smtp_password'] = array();
              }
              $this->NM_ajax_info['errList']['smtp_password'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'smtp_password';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_smtp_password

    function ValidateField_contacto_nombre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contacto_nombre) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre Contacto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contacto_nombre']))
              {
                  $Campos_Erros['contacto_nombre'] = array();
              }
              $Campos_Erros['contacto_nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contacto_nombre']) || !is_array($this->NM_ajax_info['errList']['contacto_nombre']))
              {
                  $this->NM_ajax_info['errList']['contacto_nombre'] = array();
              }
              $this->NM_ajax_info['errList']['contacto_nombre'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contacto_nombre';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contacto_nombre

    function ValidateField_contacto_cargo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contacto_cargo) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cargo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contacto_cargo']))
              {
                  $Campos_Erros['contacto_cargo'] = array();
              }
              $Campos_Erros['contacto_cargo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contacto_cargo']) || !is_array($this->NM_ajax_info['errList']['contacto_cargo']))
              {
                  $this->NM_ajax_info['errList']['contacto_cargo'] = array();
              }
              $this->NM_ajax_info['errList']['contacto_cargo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contacto_cargo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contacto_cargo

    function ValidateField_contacto_correo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->contacto_correo) != "")  
          { 
              if ($teste_validade->Email($this->contacto_correo) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Correo; " ; 
                  if (!isset($Campos_Erros['contacto_correo']))
                  {
                      $Campos_Erros['contacto_correo'] = array();
                  }
                  $Campos_Erros['contacto_correo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['contacto_correo']) || !is_array($this->NM_ajax_info['errList']['contacto_correo']))
                      {
                          $this->NM_ajax_info['errList']['contacto_correo'] = array();
                      }
                      $this->NM_ajax_info['errList']['contacto_correo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contacto_correo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contacto_correo

    function ValidateField_contacto_celular(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->contacto_celular = sc_strtoupper($this->contacto_celular); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contacto_celular) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tel/Cel " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contacto_celular']))
              {
                  $Campos_Erros['contacto_celular'] = array();
              }
              $Campos_Erros['contacto_celular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contacto_celular']) || !is_array($this->NM_ajax_info['errList']['contacto_celular']))
              {
                  $this->NM_ajax_info['errList']['contacto_celular'] = array();
              }
              $this->NM_ajax_info['errList']['contacto_celular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789Ç -EXT()";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->contacto_celular ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->contacto_celular, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tel/Cel " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['contacto_celular']))
              {
                  $Campos_Erros['contacto_celular'] = array();
              }
              $Campos_Erros['contacto_celular'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['contacto_celular']) || !is_array($this->NM_ajax_info['errList']['contacto_celular']))
              {
                  $this->NM_ajax_info['errList']['contacto_celular'] = array();
              }
              $this->NM_ajax_info['errList']['contacto_celular'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contacto_celular';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contacto_celular

    function ValidateField_contacto_fijo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contacto_fijo) > 60) 
          { 
              $hasError = true;
              $Campos_Crit .= "Teléfono Fijo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contacto_fijo']))
              {
                  $Campos_Erros['contacto_fijo'] = array();
              }
              $Campos_Erros['contacto_fijo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contacto_fijo']) || !is_array($this->NM_ajax_info['errList']['contacto_fijo']))
              {
                  $this->NM_ajax_info['errList']['contacto_fijo'] = array();
              }
              $this->NM_ajax_info['errList']['contacto_fijo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 60 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'contacto_fijo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_contacto_fijo

    function ValidateField_logo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->logo;
            if ("" != $this->logo && "S" != $this->logo_limpa && !$teste_validade->ArqExtensao($this->logo, array('jpeg', 'jpg')))
            {
                $hasError = true;
                $Campos_Crit .= "Logo: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['logo']))
                {
                    $Campos_Erros['logo'] = array();
                }
                $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                {
                    $this->NM_ajax_info['errList']['logo'] = array();
                }
                $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if (!$hasError && "" != $this->logo && "S" != $this->logo_limpa) {
                if (!function_exists('sc_upload_unprotect_chars')) {
                    include_once 'form_cloud_empresas_mob_doc_name.php';
                }
                $pathParts = pathinfo(sc_upload_unprotect_chars($sTestFile));
                $fileSize = filesize(sc_upload_unprotect_chars($sTestFile));
                $sizeErrorSuffix = '';
                if ($hasError) {
                    $Campos_Crit .= "Logo: " . $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($Campos_Erros['logo']))
                    {
                        $Campos_Erros['logo'] = array();
                    }
                    $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                    if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                    {
                        $this->NM_ajax_info['errList']['logo'] = array();
                    }
                    $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_file_size'] . $sizeErrorSuffix;
                }
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'logo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_logo

    function ValidateField_asunto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->asunto) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Asunto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['asunto']))
              {
                  $Campos_Erros['asunto'] = array();
              }
              $Campos_Erros['asunto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['asunto']) || !is_array($this->NM_ajax_info['errList']['asunto']))
              {
                  $this->NM_ajax_info['errList']['asunto'] = array();
              }
              $this->NM_ajax_info['errList']['asunto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'asunto';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_asunto

    function ValidateField_mensaje(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->mensaje))
      {
          $this->mensaje = NM_conv_charset($this->mensaje, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->mensaje = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->mensaje);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->mensaje) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mensaje';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mensaje

    function ValidateField_head_note(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->head_note) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cabecera " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['head_note']))
              {
                  $Campos_Erros['head_note'] = array();
              }
              $Campos_Erros['head_note'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['head_note']) || !is_array($this->NM_ajax_info['errList']['head_note']))
              {
                  $this->NM_ajax_info['errList']['head_note'] = array();
              }
              $this->NM_ajax_info['errList']['head_note'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'head_note';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_head_note

    function ValidateField_pie_pagina(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pie_pagina) > 1000) 
          { 
              $hasError = true;
              $Campos_Crit .= "Pie página factura " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pie_pagina']))
              {
                  $Campos_Erros['pie_pagina'] = array();
              }
              $Campos_Erros['pie_pagina'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pie_pagina']) || !is_array($this->NM_ajax_info['errList']['pie_pagina']))
              {
                  $this->NM_ajax_info['errList']['pie_pagina'] = array();
              }
              $this->NM_ajax_info['errList']['pie_pagina'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pie_pagina';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pie_pagina

    function ValidateField_mensaje_nc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->mensaje_nc))
      {
          $this->mensaje_nc = NM_conv_charset($this->mensaje_nc, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->mensaje_nc = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->mensaje_nc);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->mensaje_nc) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mensaje_nc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mensaje_nc

    function ValidateField_pie_pagina_nc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->pie_pagina_nc))
      {
          $this->pie_pagina_nc = NM_conv_charset($this->pie_pagina_nc, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->pie_pagina_nc = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->pie_pagina_nc);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->pie_pagina_nc) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pie_pagina_nc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pie_pagina_nc

    function ValidateField_servidor_facturas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor_facturas) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor Facturas " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor_facturas']))
              {
                  $Campos_Erros['servidor_facturas'] = array();
              }
              $Campos_Erros['servidor_facturas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor_facturas']) || !is_array($this->NM_ajax_info['errList']['servidor_facturas']))
              {
                  $this->NM_ajax_info['errList']['servidor_facturas'] = array();
              }
              $this->NM_ajax_info['errList']['servidor_facturas'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor_facturas';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor_facturas

    function ValidateField_servidor_nc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->servidor_nc) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Servidor Notas Crédito " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['servidor_nc']))
              {
                  $Campos_Erros['servidor_nc'] = array();
              }
              $Campos_Erros['servidor_nc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['servidor_nc']) || !is_array($this->NM_ajax_info['errList']['servidor_nc']))
              {
                  $this->NM_ajax_info['errList']['servidor_nc'] = array();
              }
              $this->NM_ajax_info['errList']['servidor_nc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servidor_nc';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servidor_nc

    function ValidateField_correo_para_prueba(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->correo_para_prueba = sc_strtolower($this->correo_para_prueba); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->correo_para_prueba) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Correo para Prueba " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['correo_para_prueba']))
              {
                  $Campos_Erros['correo_para_prueba'] = array();
              }
              $Campos_Erros['correo_para_prueba'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['correo_para_prueba']) || !is_array($this->NM_ajax_info['errList']['correo_para_prueba']))
              {
                  $this->NM_ajax_info['errList']['correo_para_prueba'] = array();
              }
              $this->NM_ajax_info['errList']['correo_para_prueba'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'correo_para_prueba';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_correo_para_prueba

    function ValidateField_correo_prueba(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->correo_prueba) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'correo_prueba';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_correo_prueba

    function ValidateField_enviar_datos_establecimiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->enviar_datos_establecimiento == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->enviar_datos_establecimiento = "NO";
      } 
      else 
      { 
          if (is_array($this->enviar_datos_establecimiento))
          {
              $x = 0; 
              $this->enviar_datos_establecimiento_1 = array(); 
              foreach ($this->enviar_datos_establecimiento as $ind => $dados_enviar_datos_establecimiento_1 ) 
              {
                  if ($dados_enviar_datos_establecimiento_1 != "") 
                  {
                      $this->enviar_datos_establecimiento_1[] = $dados_enviar_datos_establecimiento_1;
                  } 
              } 
              $this->enviar_datos_establecimiento = ""; 
              foreach ($this->enviar_datos_establecimiento_1 as $dados_enviar_datos_establecimiento_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->enviar_datos_establecimiento .= ";";
                   } 
                   $this->enviar_datos_establecimiento .= $dados_enviar_datos_establecimiento_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'enviar_datos_establecimiento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_enviar_datos_establecimiento

    function ValidateField_nombre_pc_red(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->nombre_pc_red = sc_strtoupper($this->nombre_pc_red); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombre_pc_red) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre PC red " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombre_pc_red']))
              {
                  $Campos_Erros['nombre_pc_red'] = array();
              }
              $Campos_Erros['nombre_pc_red'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombre_pc_red']) || !is_array($this->NM_ajax_info['errList']['nombre_pc_red']))
              {
                  $this->NM_ajax_info['errList']['nombre_pc_red'] = array();
              }
              $this->NM_ajax_info['errList']['nombre_pc_red'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombre_pc_red';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombre_pc_red

    function ValidateField_sumarimpuestosdeldetalle(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->sumarimpuestosdeldetalle == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->sumarimpuestosdeldetalle = "NO";
      } 
      else 
      { 
          if (is_array($this->sumarimpuestosdeldetalle))
          {
              $x = 0; 
              $this->sumarimpuestosdeldetalle_1 = array(); 
              foreach ($this->sumarimpuestosdeldetalle as $ind => $dados_sumarimpuestosdeldetalle_1 ) 
              {
                  if ($dados_sumarimpuestosdeldetalle_1 != "") 
                  {
                      $this->sumarimpuestosdeldetalle_1[] = $dados_sumarimpuestosdeldetalle_1;
                  } 
              } 
              $this->sumarimpuestosdeldetalle = ""; 
              foreach ($this->sumarimpuestosdeldetalle_1 as $dados_sumarimpuestosdeldetalle_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->sumarimpuestosdeldetalle .= ";";
                   } 
                   $this->sumarimpuestosdeldetalle .= $dados_sumarimpuestosdeldetalle_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sumarimpuestosdeldetalle';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sumarimpuestosdeldetalle

    function ValidateField_cantidaddecimales(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->cantidaddecimales === "" || is_null($this->cantidaddecimales))  
      { 
          $this->cantidaddecimales = 0;
          $this->sc_force_zero[] = 'cantidaddecimales';
      } 
      nm_limpa_numero($this->cantidaddecimales, $this->field_config['cantidaddecimales']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->cantidaddecimales != '')  
          { 
              $iTestSize = 1;
              if (strlen($this->cantidaddecimales) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Decimales: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['cantidaddecimales']))
                  {
                      $Campos_Erros['cantidaddecimales'] = array();
                  }
                  $Campos_Erros['cantidaddecimales'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['cantidaddecimales']) || !is_array($this->NM_ajax_info['errList']['cantidaddecimales']))
                  {
                      $this->NM_ajax_info['errList']['cantidaddecimales'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidaddecimales'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->cantidaddecimales, 1, 0, -0, 9, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Cantidad Decimales; " ; 
                  if (!isset($Campos_Erros['cantidaddecimales']))
                  {
                      $Campos_Erros['cantidaddecimales'] = array();
                  }
                  $Campos_Erros['cantidaddecimales'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['cantidaddecimales']) || !is_array($this->NM_ajax_info['errList']['cantidaddecimales']))
                  {
                      $this->NM_ajax_info['errList']['cantidaddecimales'] = array();
                  }
                  $this->NM_ajax_info['errList']['cantidaddecimales'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cantidaddecimales';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cantidaddecimales

    function ValidateField_valortributounidad(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->valortributounidad) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "Valor Tributo Unidad " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['valortributounidad']))
              {
                  $Campos_Erros['valortributounidad'] = array();
              }
              $Campos_Erros['valortributounidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['valortributounidad']) || !is_array($this->NM_ajax_info['errList']['valortributounidad']))
              {
                  $this->NM_ajax_info['errList']['valortributounidad'] = array();
              }
              $this->NM_ajax_info['errList']['valortributounidad'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'valortributounidad';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_valortributounidad

    function ValidateField_conf_auto_tercero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->conf_auto_tercero == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->conf_auto_tercero = "NO";
      } 
      else 
      { 
          if (is_array($this->conf_auto_tercero))
          {
              $x = 0; 
              $this->conf_auto_tercero_1 = array(); 
              foreach ($this->conf_auto_tercero as $ind => $dados_conf_auto_tercero_1 ) 
              {
                  if ($dados_conf_auto_tercero_1 != "") 
                  {
                      $this->conf_auto_tercero_1[] = $dados_conf_auto_tercero_1;
                  } 
              } 
              $this->conf_auto_tercero = ""; 
              foreach ($this->conf_auto_tercero_1 as $dados_conf_auto_tercero_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->conf_auto_tercero .= ";";
                   } 
                   $this->conf_auto_tercero .= $dados_conf_auto_tercero_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'conf_auto_tercero';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_conf_auto_tercero

    function ValidateField_no_validar_mail(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->no_validar_mail == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->no_validar_mail = "NO";
      } 
      else 
      { 
          if (is_array($this->no_validar_mail))
          {
              $x = 0; 
              $this->no_validar_mail_1 = array(); 
              foreach ($this->no_validar_mail as $ind => $dados_no_validar_mail_1 ) 
              {
                  if ($dados_no_validar_mail_1 != "") 
                  {
                      $this->no_validar_mail_1[] = $dados_no_validar_mail_1;
                  } 
              } 
              $this->no_validar_mail = ""; 
              foreach ($this->no_validar_mail_1 as $dados_no_validar_mail_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->no_validar_mail .= ";";
                   } 
                   $this->no_validar_mail .= $dados_no_validar_mail_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'no_validar_mail';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_no_validar_mail

    function ValidateField_email_alternativo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->email_alternativo) != "")  
          { 
              if ($teste_validade->Email($this->email_alternativo) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Correo alternativo; " ; 
                  if (!isset($Campos_Erros['email_alternativo']))
                  {
                      $Campos_Erros['email_alternativo'] = array();
                  }
                  $Campos_Erros['email_alternativo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['email_alternativo']) || !is_array($this->NM_ajax_info['errList']['email_alternativo']))
                      {
                          $this->NM_ajax_info['errList']['email_alternativo'] = array();
                      }
                      $this->NM_ajax_info['errList']['email_alternativo'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'email_alternativo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_email_alternativo

    function ValidateField_desviar_correo_a(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->desviar_correo_a) != "")  
          { 
              if ($teste_validade->Email($this->desviar_correo_a) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Desviar correo a; " ; 
                  if (!isset($Campos_Erros['desviar_correo_a']))
                  {
                      $Campos_Erros['desviar_correo_a'] = array();
                  }
                  $Campos_Erros['desviar_correo_a'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['desviar_correo_a']) || !is_array($this->NM_ajax_info['errList']['desviar_correo_a']))
                      {
                          $this->NM_ajax_info['errList']['desviar_correo_a'] = array();
                      }
                      $this->NM_ajax_info['errList']['desviar_correo_a'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'desviar_correo_a';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_desviar_correo_a

    function ValidateField_correo_copia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->correo_copia) != "")  
          { 
              if ($teste_validade->Email($this->correo_copia) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Enviar copia a; " ; 
                  if (!isset($Campos_Erros['correo_copia']))
                  {
                      $Campos_Erros['correo_copia'] = array();
                  }
                  $Campos_Erros['correo_copia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['correo_copia']) || !is_array($this->NM_ajax_info['errList']['correo_copia']))
                      {
                          $this->NM_ajax_info['errList']['correo_copia'] = array();
                      }
                      $this->NM_ajax_info['errList']['correo_copia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'correo_copia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_correo_copia

    function ValidateField_informacion_adicional(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->informacion_adicional) > 1000) 
          { 
              $hasError = true;
              $Campos_Crit .= "Información Adicional " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['informacion_adicional']))
              {
                  $Campos_Erros['informacion_adicional'] = array();
              }
              $Campos_Erros['informacion_adicional'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['informacion_adicional']) || !is_array($this->NM_ajax_info['errList']['informacion_adicional']))
              {
                  $this->NM_ajax_info['errList']['informacion_adicional'] = array();
              }
              $this->NM_ajax_info['errList']['informacion_adicional'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 1000 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'informacion_adicional';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_informacion_adicional

    function ValidateField_tomar_municipio_tns(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tomar_municipio_tns == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->tomar_municipio_tns = "NO";
      } 
      else 
      { 
          if (is_array($this->tomar_municipio_tns))
          {
              $x = 0; 
              $this->tomar_municipio_tns_1 = array(); 
              foreach ($this->tomar_municipio_tns as $ind => $dados_tomar_municipio_tns_1 ) 
              {
                  if ($dados_tomar_municipio_tns_1 != "") 
                  {
                      $this->tomar_municipio_tns_1[] = $dados_tomar_municipio_tns_1;
                  } 
              } 
              $this->tomar_municipio_tns = ""; 
              foreach ($this->tomar_municipio_tns_1 as $dados_tomar_municipio_tns_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->tomar_municipio_tns .= ";";
                   } 
                   $this->tomar_municipio_tns .= $dados_tomar_municipio_tns_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tomar_municipio_tns';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tomar_municipio_tns

    function ValidateField_validar_codcliente_tns(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->validar_codcliente_tns == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->validar_codcliente_tns = "NO";
      } 
      else 
      { 
          if (is_array($this->validar_codcliente_tns))
          {
              $x = 0; 
              $this->validar_codcliente_tns_1 = array(); 
              foreach ($this->validar_codcliente_tns as $ind => $dados_validar_codcliente_tns_1 ) 
              {
                  if ($dados_validar_codcliente_tns_1 != "") 
                  {
                      $this->validar_codcliente_tns_1[] = $dados_validar_codcliente_tns_1;
                  } 
              } 
              $this->validar_codcliente_tns = ""; 
              foreach ($this->validar_codcliente_tns_1 as $dados_validar_codcliente_tns_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->validar_codcliente_tns .= ";";
                   } 
                   $this->validar_codcliente_tns .= $dados_validar_codcliente_tns_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'validar_codcliente_tns';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_validar_codcliente_tns

    function ValidateField_desactivar_xml_enlista(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->desactivar_xml_enlista == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->desactivar_xml_enlista = "NO";
      } 
      else 
      { 
          if (is_array($this->desactivar_xml_enlista))
          {
              $x = 0; 
              $this->desactivar_xml_enlista_1 = array(); 
              foreach ($this->desactivar_xml_enlista as $ind => $dados_desactivar_xml_enlista_1 ) 
              {
                  if ($dados_desactivar_xml_enlista_1 != "") 
                  {
                      $this->desactivar_xml_enlista_1[] = $dados_desactivar_xml_enlista_1;
                  } 
              } 
              $this->desactivar_xml_enlista = ""; 
              foreach ($this->desactivar_xml_enlista_1 as $dados_desactivar_xml_enlista_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->desactivar_xml_enlista .= ";";
                   } 
                   $this->desactivar_xml_enlista .= $dados_desactivar_xml_enlista_1;
                   $x++ ; 
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'desactivar_xml_enlista';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_desactivar_xml_enlista

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

    function ValidateField_url_bouncer(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->url_bouncer) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'url_bouncer';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_url_bouncer

    function ValidateField_apikey_bouncer(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->apikey_bouncer) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Apikey Bouncer " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['apikey_bouncer']))
              {
                  $Campos_Erros['apikey_bouncer'] = array();
              }
              $Campos_Erros['apikey_bouncer'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['apikey_bouncer']) || !is_array($this->NM_ajax_info['errList']['apikey_bouncer']))
              {
                  $this->NM_ajax_info['errList']['apikey_bouncer'] = array();
              }
              $this->NM_ajax_info['errList']['apikey_bouncer'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'apikey_bouncer';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_apikey_bouncer

    function ValidateField_tiempo_bouncer(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->tiempo_bouncer === "" || is_null($this->tiempo_bouncer))  
      { 
          $this->tiempo_bouncer = 0;
          $this->sc_force_zero[] = 'tiempo_bouncer';
      } 
      nm_limpa_numero($this->tiempo_bouncer, $this->field_config['tiempo_bouncer']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->tiempo_bouncer != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->tiempo_bouncer) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tiempo Bouncer: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['tiempo_bouncer']))
                  {
                      $Campos_Erros['tiempo_bouncer'] = array();
                  }
                  $Campos_Erros['tiempo_bouncer'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['tiempo_bouncer']) || !is_array($this->NM_ajax_info['errList']['tiempo_bouncer']))
                  {
                      $this->NM_ajax_info['errList']['tiempo_bouncer'] = array();
                  }
                  $this->NM_ajax_info['errList']['tiempo_bouncer'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->tiempo_bouncer, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tiempo Bouncer; " ; 
                  if (!isset($Campos_Erros['tiempo_bouncer']))
                  {
                      $Campos_Erros['tiempo_bouncer'] = array();
                  }
                  $Campos_Erros['tiempo_bouncer'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['tiempo_bouncer']) || !is_array($this->NM_ajax_info['errList']['tiempo_bouncer']))
                  {
                      $this->NM_ajax_info['errList']['tiempo_bouncer'] = array();
                  }
                  $this->NM_ajax_info['errList']['tiempo_bouncer'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tiempo_bouncer';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tiempo_bouncer

    function ValidateField_url_validar_licencia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->url_validar_licencia = sc_strtolower($this->url_validar_licencia); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->url_validar_licencia) > 300) 
          { 
              $hasError = true;
              $Campos_Crit .= "Url Validar Licencia " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['url_validar_licencia']))
              {
                  $Campos_Erros['url_validar_licencia'] = array();
              }
              $Campos_Erros['url_validar_licencia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['url_validar_licencia']) || !is_array($this->NM_ajax_info['errList']['url_validar_licencia']))
              {
                  $this->NM_ajax_info['errList']['url_validar_licencia'] = array();
              }
              $this->NM_ajax_info['errList']['url_validar_licencia'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 300 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'url_validar_licencia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_url_validar_licencia
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->logo == "none") 
          { 
              $this->logo = ""; 
          } 
          if ($this->logo != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_cloud_empresas_mob_doc_name.php';
              }
              $this->logo = sc_upload_unprotect_chars($this->logo);
              $this->logo_scfile_name = sc_upload_unprotect_chars($this->logo_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->logo_scfile_type = substr($this->logo_scfile_type, 0, strpos($this->logo_scfile_type, ";")) ; 
              } 
              if ($this->logo_scfile_type == "image/pjpeg" || $this->logo_scfile_type == "image/jpeg" || $this->logo_scfile_type == "image/gif" ||  
                  $this->logo_scfile_type == "image/png" || $this->logo_scfile_type == "image/x-png" || $this->logo_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->logo))  
                  { 
                      $this->NM_size_docs[$this->logo_scfile_name] = $this->sc_file_size($this->logo);
                      if ($this->nmgp_opcao == "incluir")
                      { 
                          $this->SC_IMG_logo = $this->logo;
                      } 
                      else 
                      { 
                          $arq_logo = fopen($this->logo, "r") ; 
                          $reg_logo = fread($arq_logo, filesize($this->logo)) ; 
                          fclose($arq_logo) ;  
                      } 
                      $this->logo =  trim($this->logo_scfile_name) ;  
                      $dir_img = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . "/"; 
                     if ($this->nmgp_opcao != "incluir")
                     { 
                      if (nm_mkdir($dir_img))  
                      { 
                          $arq_logo = fopen($dir_img . trim($this->logo_scfile_name), "w") ; 
                          fwrite($arq_logo, $reg_logo) ;  
                          fclose($arq_logo) ;  
                      } 
                      else 
                      { 
                          $Campos_Crit .= "Logo: " . $this->Ini->Nm_lang['lang_errm_ivdr']; 
                          $this->logo = "";
                          if (!isset($Campos_Erros['logo']))
                          {
                              $Campos_Erros['logo'] = array();
                          }
                          $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                          if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                          {
                              $this->NM_ajax_info['errList']['logo'] = array();
                          }
                          $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                      } 
                     } 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Logo " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->logo = "";
                      if (!isset($Campos_Erros['logo']))
                      {
                          $Campos_Erros['logo'] = array();
                      }
                      $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                      {
                          $this->NM_ajax_info['errList']['logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->logo = "" ; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Logo " . $this->Ini->Nm_lang['lang_errm_ivtp']; 
                      if (!isset($Campos_Erros['logo']))
                      {
                          $Campos_Erros['logo'] = array();
                      }
                      $Campos_Erros['logo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                      if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                      {
                          $this->NM_ajax_info['errList']['logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                  } 
              } 
          } 
          elseif (!empty($this->logo_salva) && $this->logo_limpa != "S")
          {
              $this->logo = $this->logo_salva;
          }
      } 
      elseif (!empty($this->logo_salva) && $this->logo_limpa != "S")
      {
          $this->logo = $this->logo_salva;
      }
   }

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
    $this->nmgp_dados_form['id_empresa'] = $this->id_empresa;
    $this->nmgp_dados_form['ccnit'] = $this->ccnit;
    $this->nmgp_dados_form['nombre_razonsocial'] = $this->nombre_razonsocial;
    $this->nmgp_dados_form['serial'] = $this->serial;
    $this->nmgp_dados_form['activo'] = $this->activo;
    $this->nmgp_dados_form['nit'] = $this->nit;
    $this->nmgp_dados_form['razon_social'] = $this->razon_social;
    $this->nmgp_dados_form['celular'] = $this->celular;
    $this->nmgp_dados_form['correo'] = $this->correo;
    $this->nmgp_dados_form['codsucursal'] = $this->codsucursal;
    $this->nmgp_dados_form['direccion'] = $this->direccion;
    $this->nmgp_dados_form['ciudad'] = $this->ciudad;
    $this->nmgp_dados_form['pagina_web'] = $this->pagina_web;
    $this->nmgp_dados_form['actividad_principal'] = $this->actividad_principal;
    $this->nmgp_dados_form['regimen'] = $this->regimen;
    $this->nmgp_dados_form['observaciones'] = $this->observaciones;
    $this->nmgp_dados_form['proveedor'] = $this->proveedor;
    $this->nmgp_dados_form['modo'] = $this->modo;
    $this->nmgp_dados_form['enviar_dian'] = $this->enviar_dian;
    $this->nmgp_dados_form['enviar_cliente'] = $this->enviar_cliente;
    $this->nmgp_dados_form['servidor1'] = $this->servidor1;
    $this->nmgp_dados_form['servidor2'] = $this->servidor2;
    $this->nmgp_dados_form['servidor3'] = $this->servidor3;
    $this->nmgp_dados_form['tokenempresa'] = $this->tokenempresa;
    $this->nmgp_dados_form['tokenpassword'] = $this->tokenpassword;
    $this->nmgp_dados_form['servidor1_pruebas'] = $this->servidor1_pruebas;
    $this->nmgp_dados_form['servidor2_pruebas'] = $this->servidor2_pruebas;
    $this->nmgp_dados_form['servidor3_pruebas'] = $this->servidor3_pruebas;
    $this->nmgp_dados_form['token_pruebas'] = $this->token_pruebas;
    $this->nmgp_dados_form['password_pruebas'] = $this->password_pruebas;
    $this->nmgp_dados_form['enviar_documento_online'] = $this->enviar_documento_online;
    $this->nmgp_dados_form['smtp_tipo'] = $this->smtp_tipo;
    $this->nmgp_dados_form['smtp_servidor'] = $this->smtp_servidor;
    $this->nmgp_dados_form['smtp_puerto'] = $this->smtp_puerto;
    $this->nmgp_dados_form['smtp_usuario'] = $this->smtp_usuario;
    $this->nmgp_dados_form['smtp_password'] = $this->smtp_password;
    $this->nmgp_dados_form['contacto_nombre'] = $this->contacto_nombre;
    $this->nmgp_dados_form['contacto_cargo'] = $this->contacto_cargo;
    $this->nmgp_dados_form['contacto_correo'] = $this->contacto_correo;
    $this->nmgp_dados_form['contacto_celular'] = $this->contacto_celular;
    $this->nmgp_dados_form['contacto_fijo'] = $this->contacto_fijo;
    if (empty($this->logo))
    {
        $this->logo = $this->nmgp_dados_form['logo'];
    }
    $this->nmgp_dados_form['logo'] = $this->logo;
    $this->nmgp_dados_form['logo_limpa'] = $this->logo_limpa;
    $this->nmgp_dados_form['asunto'] = $this->asunto;
    $this->nmgp_dados_form['mensaje'] = $this->mensaje;
    $this->nmgp_dados_form['head_note'] = $this->head_note;
    $this->nmgp_dados_form['pie_pagina'] = $this->pie_pagina;
    $this->nmgp_dados_form['mensaje_nc'] = $this->mensaje_nc;
    $this->nmgp_dados_form['pie_pagina_nc'] = $this->pie_pagina_nc;
    $this->nmgp_dados_form['servidor_facturas'] = $this->servidor_facturas;
    $this->nmgp_dados_form['servidor_nc'] = $this->servidor_nc;
    $this->nmgp_dados_form['correo_para_prueba'] = $this->correo_para_prueba;
    $this->nmgp_dados_form['correo_prueba'] = $this->correo_prueba;
    $this->nmgp_dados_form['enviar_datos_establecimiento'] = $this->enviar_datos_establecimiento;
    $this->nmgp_dados_form['nombre_pc_red'] = $this->nombre_pc_red;
    $this->nmgp_dados_form['sumarimpuestosdeldetalle'] = $this->sumarimpuestosdeldetalle;
    $this->nmgp_dados_form['cantidaddecimales'] = $this->cantidaddecimales;
    $this->nmgp_dados_form['valortributounidad'] = $this->valortributounidad;
    $this->nmgp_dados_form['conf_auto_tercero'] = $this->conf_auto_tercero;
    $this->nmgp_dados_form['no_validar_mail'] = $this->no_validar_mail;
    $this->nmgp_dados_form['email_alternativo'] = $this->email_alternativo;
    $this->nmgp_dados_form['desviar_correo_a'] = $this->desviar_correo_a;
    $this->nmgp_dados_form['correo_copia'] = $this->correo_copia;
    $this->nmgp_dados_form['informacion_adicional'] = $this->informacion_adicional;
    $this->nmgp_dados_form['tomar_municipio_tns'] = $this->tomar_municipio_tns;
    $this->nmgp_dados_form['validar_codcliente_tns'] = $this->validar_codcliente_tns;
    $this->nmgp_dados_form['desactivar_xml_enlista'] = $this->desactivar_xml_enlista;
    $this->nmgp_dados_form['validar_correo_enlinea'] = $this->validar_correo_enlinea;
    $this->nmgp_dados_form['url_bouncer'] = $this->url_bouncer;
    $this->nmgp_dados_form['apikey_bouncer'] = $this->apikey_bouncer;
    $this->nmgp_dados_form['tiempo_bouncer'] = $this->tiempo_bouncer;
    $this->nmgp_dados_form['url_validar_licencia'] = $this->url_validar_licencia;
    $this->nmgp_dados_form['creado'] = $this->creado;
    $this->nmgp_dados_form['editado'] = $this->editado;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['id_empresa'] = $this->id_empresa;
      nm_limpa_numero($this->id_empresa, $this->field_config['id_empresa']['symbol_grp']) ; 
      $this->Before_unformat['smtp_puerto'] = $this->smtp_puerto;
      nm_limpa_numero($this->smtp_puerto, $this->field_config['smtp_puerto']['symbol_grp']) ; 
      $this->Before_unformat['cantidaddecimales'] = $this->cantidaddecimales;
      nm_limpa_numero($this->cantidaddecimales, $this->field_config['cantidaddecimales']['symbol_grp']) ; 
      $this->Before_unformat['tiempo_bouncer'] = $this->tiempo_bouncer;
      nm_limpa_numero($this->tiempo_bouncer, $this->field_config['tiempo_bouncer']['symbol_grp']) ; 
      $this->Before_unformat['creado'] = $this->creado;
      $this->Before_unformat['creado_hora'] = $this->creado_hora;
      nm_limpa_data($this->creado, $this->field_config['creado']['date_sep']) ; 
      nm_limpa_hora($this->creado_hora, $this->field_config['creado']['time_sep']) ; 
      $this->Before_unformat['editado'] = $this->editado;
      $this->Before_unformat['editado_hora'] = $this->editado_hora;
      nm_limpa_data($this->editado, $this->field_config['editado']['date_sep']) ; 
      nm_limpa_hora($this->editado_hora, $this->field_config['editado']['time_sep']) ; 
   }
   function nm_tira_formatacao_id_empresa($Val_in)
   {
      nm_limpa_numero($Val_in, $this->field_config['id_empresa']['symbol_grp']) ; 
      return $Val_in;
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
      if ($Nome_Campo == "id_empresa")
      {
          nm_limpa_numero($this->id_empresa, $this->field_config['id_empresa']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "smtp_puerto")
      {
          nm_limpa_numero($this->smtp_puerto, $this->field_config['smtp_puerto']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cantidaddecimales")
      {
          nm_limpa_numero($this->cantidaddecimales, $this->field_config['cantidaddecimales']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "tiempo_bouncer")
      {
          nm_limpa_numero($this->tiempo_bouncer, $this->field_config['tiempo_bouncer']['symbol_grp']) ; 
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
      if ('' !== $this->id_empresa || (!empty($format_fields) && isset($format_fields['id_empresa'])))
      {
          nmgp_Form_Num_Val($this->id_empresa, $this->field_config['id_empresa']['symbol_grp'], $this->field_config['id_empresa']['symbol_dec'], "0", "S", $this->field_config['id_empresa']['format_neg'], "", "", "-", $this->field_config['id_empresa']['symbol_fmt']) ; 
      }
      if ('' !== $this->smtp_puerto || (!empty($format_fields) && isset($format_fields['smtp_puerto'])))
      {
          nmgp_Form_Num_Val($this->smtp_puerto, $this->field_config['smtp_puerto']['symbol_grp'], $this->field_config['smtp_puerto']['symbol_dec'], "0", "S", $this->field_config['smtp_puerto']['format_neg'], "", "", "-", $this->field_config['smtp_puerto']['symbol_fmt']) ; 
      }
      if ('' !== $this->cantidaddecimales || (!empty($format_fields) && isset($format_fields['cantidaddecimales'])))
      {
          nmgp_Form_Num_Val($this->cantidaddecimales, $this->field_config['cantidaddecimales']['symbol_grp'], $this->field_config['cantidaddecimales']['symbol_dec'], "0", "S", $this->field_config['cantidaddecimales']['format_neg'], "", "", "-", $this->field_config['cantidaddecimales']['symbol_fmt']) ; 
      }
      if ('' !== $this->tiempo_bouncer || (!empty($format_fields) && isset($format_fields['tiempo_bouncer'])))
      {
          nmgp_Form_Num_Val($this->tiempo_bouncer, $this->field_config['tiempo_bouncer']['symbol_grp'], $this->field_config['tiempo_bouncer']['symbol_dec'], "0", "S", $this->field_config['tiempo_bouncer']['format_neg'], "", "", "-", $this->field_config['tiempo_bouncer']['symbol_fmt']) ; 
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
          $this->ajax_return_values_id_empresa();
          $this->ajax_return_values_ccnit();
          $this->ajax_return_values_nombre_razonsocial();
          $this->ajax_return_values_serial();
          $this->ajax_return_values_activo();
          $this->ajax_return_values_nit();
          $this->ajax_return_values_razon_social();
          $this->ajax_return_values_celular();
          $this->ajax_return_values_correo();
          $this->ajax_return_values_codsucursal();
          $this->ajax_return_values_direccion();
          $this->ajax_return_values_ciudad();
          $this->ajax_return_values_pagina_web();
          $this->ajax_return_values_actividad_principal();
          $this->ajax_return_values_regimen();
          $this->ajax_return_values_observaciones();
          $this->ajax_return_values_proveedor();
          $this->ajax_return_values_modo();
          $this->ajax_return_values_enviar_dian();
          $this->ajax_return_values_enviar_cliente();
          $this->ajax_return_values_servidor1();
          $this->ajax_return_values_servidor2();
          $this->ajax_return_values_servidor3();
          $this->ajax_return_values_tokenempresa();
          $this->ajax_return_values_tokenpassword();
          $this->ajax_return_values_servidor1_pruebas();
          $this->ajax_return_values_servidor2_pruebas();
          $this->ajax_return_values_servidor3_pruebas();
          $this->ajax_return_values_token_pruebas();
          $this->ajax_return_values_password_pruebas();
          $this->ajax_return_values_enviar_documento_online();
          $this->ajax_return_values_smtp_tipo();
          $this->ajax_return_values_smtp_servidor();
          $this->ajax_return_values_smtp_puerto();
          $this->ajax_return_values_smtp_usuario();
          $this->ajax_return_values_smtp_password();
          $this->ajax_return_values_contacto_nombre();
          $this->ajax_return_values_contacto_cargo();
          $this->ajax_return_values_contacto_correo();
          $this->ajax_return_values_contacto_celular();
          $this->ajax_return_values_contacto_fijo();
          $this->ajax_return_values_logo();
          $this->ajax_return_values_asunto();
          $this->ajax_return_values_mensaje();
          $this->ajax_return_values_head_note();
          $this->ajax_return_values_pie_pagina();
          $this->ajax_return_values_mensaje_nc();
          $this->ajax_return_values_pie_pagina_nc();
          $this->ajax_return_values_servidor_facturas();
          $this->ajax_return_values_servidor_nc();
          $this->ajax_return_values_correo_para_prueba();
          $this->ajax_return_values_correo_prueba();
          $this->ajax_return_values_enviar_datos_establecimiento();
          $this->ajax_return_values_nombre_pc_red();
          $this->ajax_return_values_sumarimpuestosdeldetalle();
          $this->ajax_return_values_cantidaddecimales();
          $this->ajax_return_values_valortributounidad();
          $this->ajax_return_values_conf_auto_tercero();
          $this->ajax_return_values_no_validar_mail();
          $this->ajax_return_values_email_alternativo();
          $this->ajax_return_values_desviar_correo_a();
          $this->ajax_return_values_correo_copia();
          $this->ajax_return_values_informacion_adicional();
          $this->ajax_return_values_tomar_municipio_tns();
          $this->ajax_return_values_validar_codcliente_tns();
          $this->ajax_return_values_desactivar_xml_enlista();
          $this->ajax_return_values_validar_correo_enlinea();
          $this->ajax_return_values_url_bouncer();
          $this->ajax_return_values_apikey_bouncer();
          $this->ajax_return_values_tiempo_bouncer();
          $this->ajax_return_values_url_validar_licencia();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_empresa']['keyVal'] = form_cloud_empresas_mob_pack_protect_string($this->nmgp_dados_form['id_empresa']);
          }
   } // ajax_return_values

          //----- id_empresa
   function ajax_return_values_id_empresa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_empresa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_empresa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_empresa'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("id_empresa", $this->form_encode_input($sTmpValue))),
              );
          }
   }

          //----- ccnit
   function ajax_return_values_ccnit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ccnit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ccnit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ccnit'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nombre_razonsocial
   function ajax_return_values_nombre_razonsocial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_razonsocial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_razonsocial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_razonsocial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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

          //----- activo
   function ajax_return_values_activo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("activo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->activo);
              $aLookup = array();
              $this->_tmp_lookup_activo = $this->activo;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('NO') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_activo'][] = 'SI';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_activo'][] = 'NO';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"activo\"";
          if (isset($this->NM_ajax_info['select_html']['activo']) && !empty($this->NM_ajax_info['select_html']['activo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['activo']);
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

                  if ($this->activo == $sValue)
                  {
                      $this->_tmp_lookup_activo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['activo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['activo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['activo']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['activo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['activo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['activo']['labList'] = $aLabel;
          }
   }

          //----- nit
   function ajax_return_values_nit($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nit", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nit);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nit'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- razon_social
   function ajax_return_values_razon_social($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("razon_social", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->razon_social);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['razon_social'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- celular
   function ajax_return_values_celular($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("celular", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->celular);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['celular'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- correo
   function ajax_return_values_correo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("correo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->correo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['correo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- codsucursal
   function ajax_return_values_codsucursal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("codsucursal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->codsucursal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['codsucursal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- direccion
   function ajax_return_values_direccion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("direccion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->direccion);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['direccion'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- ciudad
   function ajax_return_values_ciudad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("ciudad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->ciudad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['ciudad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pagina_web
   function ajax_return_values_pagina_web($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pagina_web", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pagina_web);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pagina_web'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- actividad_principal
   function ajax_return_values_actividad_principal($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("actividad_principal", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->actividad_principal);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['actividad_principal'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- regimen
   function ajax_return_values_regimen($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("regimen", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->regimen);
              $aLookup = array();
              $this->_tmp_lookup_regimen = $this->regimen;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('RESPONSABLE DE IVA') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("RESPONSABLE DE IVA")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('NO RESPONSABLE DE IVA') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("NO RESPONSABLE DE IVA")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_regimen'][] = 'RESPONSABLE DE IVA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_regimen'][] = 'NO RESPONSABLE DE IVA';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"regimen\"";
          if (isset($this->NM_ajax_info['select_html']['regimen']) && !empty($this->NM_ajax_info['select_html']['regimen']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['regimen']);
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

                  if ($this->regimen == $sValue)
                  {
                      $this->_tmp_lookup_regimen = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['regimen'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['regimen']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['regimen']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['regimen']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['regimen']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['regimen']['labList'] = $aLabel;
          }
   }

          //----- observaciones
   function ajax_return_values_observaciones($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observaciones", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observaciones);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observaciones'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- proveedor
   function ajax_return_values_proveedor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proveedor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->proveedor);
              $aLookup = array();
              $this->_tmp_lookup_proveedor = $this->proveedor;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('HKA') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("THE FACTORY")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('DATAICO') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("DATAICO")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('TECH') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("FACTURA TECH")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('FACILWEB') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("FACILWEB")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'HKA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'DATAICO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'TECH';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_proveedor'][] = 'FACILWEB';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"proveedor\"";
          if (isset($this->NM_ajax_info['select_html']['proveedor']) && !empty($this->NM_ajax_info['select_html']['proveedor']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['proveedor']);
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

                  if ($this->proveedor == $sValue)
                  {
                      $this->_tmp_lookup_proveedor = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['proveedor'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['proveedor']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['proveedor']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['proveedor']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['proveedor']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['proveedor']['labList'] = $aLabel;
          }
   }

          //----- modo
   function ajax_return_values_modo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("modo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->modo);
              $aLookup = array();
              $this->_tmp_lookup_modo = $this->modo;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('DESARROLLO') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("DESARROLLO")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('PRODUCCION') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("PRODUCCIÓN")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_modo'][] = 'DESARROLLO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_modo'][] = 'PRODUCCION';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"modo\"";
          if (isset($this->NM_ajax_info['select_html']['modo']) && !empty($this->NM_ajax_info['select_html']['modo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['modo']);
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

                  if ($this->modo == $sValue)
                  {
                      $this->_tmp_lookup_modo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['modo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['modo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['modo']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['modo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['modo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['modo']['labList'] = $aLabel;
          }
   }

          //----- enviar_dian
   function ajax_return_values_enviar_dian($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enviar_dian", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enviar_dian);
              $aLookup = array();
              $this->_tmp_lookup_enviar_dian = $this->enviar_dian;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_dian'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_dian'][] = '0';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"enviar_dian\"";
          if (isset($this->NM_ajax_info['select_html']['enviar_dian']) && !empty($this->NM_ajax_info['select_html']['enviar_dian']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['enviar_dian']);
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

                  if ($this->enviar_dian == $sValue)
                  {
                      $this->_tmp_lookup_enviar_dian = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['enviar_dian'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['enviar_dian']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['enviar_dian']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['enviar_dian']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['enviar_dian']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['enviar_dian']['labList'] = $aLabel;
          }
   }

          //----- enviar_cliente
   function ajax_return_values_enviar_cliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enviar_cliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enviar_cliente);
              $aLookup = array();
              $this->_tmp_lookup_enviar_cliente = $this->enviar_cliente;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("NO")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_cliente'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_cliente'][] = '0';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"enviar_cliente\"";
          if (isset($this->NM_ajax_info['select_html']['enviar_cliente']) && !empty($this->NM_ajax_info['select_html']['enviar_cliente']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['enviar_cliente']);
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

                  if ($this->enviar_cliente == $sValue)
                  {
                      $this->_tmp_lookup_enviar_cliente = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['enviar_cliente'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['enviar_cliente']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['enviar_cliente']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['enviar_cliente']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['enviar_cliente']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['enviar_cliente']['labList'] = $aLabel;
          }
   }

          //----- servidor1
   function ajax_return_values_servidor1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- servidor2
   function ajax_return_values_servidor2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- servidor3
   function ajax_return_values_servidor3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tokenempresa
   function ajax_return_values_tokenempresa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tokenempresa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tokenempresa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tokenempresa'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tokenpassword
   function ajax_return_values_tokenpassword($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tokenpassword", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tokenpassword);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tokenpassword'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- servidor1_pruebas
   function ajax_return_values_servidor1_pruebas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor1_pruebas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor1_pruebas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor1_pruebas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- servidor2_pruebas
   function ajax_return_values_servidor2_pruebas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor2_pruebas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor2_pruebas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor2_pruebas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- servidor3_pruebas
   function ajax_return_values_servidor3_pruebas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor3_pruebas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor3_pruebas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor3_pruebas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- token_pruebas
   function ajax_return_values_token_pruebas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("token_pruebas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->token_pruebas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['token_pruebas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- password_pruebas
   function ajax_return_values_password_pruebas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("password_pruebas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->password_pruebas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['password_pruebas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- enviar_documento_online
   function ajax_return_values_enviar_documento_online($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enviar_documento_online", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enviar_documento_online);
              $aLookup = array();
              $this->_tmp_lookup_enviar_documento_online = $this->enviar_documento_online;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_documento_online'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['enviar_documento_online']) && !empty($this->NM_ajax_info['select_html']['enviar_documento_online']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['enviar_documento_online']);
          }
          $this->NM_ajax_info['fldList']['enviar_documento_online'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-enviar_documento_online',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['enviar_documento_online']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['enviar_documento_online']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['enviar_documento_online']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['enviar_documento_online']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['enviar_documento_online']['labList'] = $aLabel;
          }
   }

          //----- smtp_tipo
   function ajax_return_values_smtp_tipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_tipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_tipo);
              $aLookup = array();
              $this->_tmp_lookup_smtp_tipo = $this->smtp_tipo;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('NO') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("NO")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('S') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SSL")));
$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('T') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("TLS")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_smtp_tipo'][] = 'NO';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_smtp_tipo'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_smtp_tipo'][] = 'T';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"smtp_tipo\"";
          if (isset($this->NM_ajax_info['select_html']['smtp_tipo']) && !empty($this->NM_ajax_info['select_html']['smtp_tipo']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['smtp_tipo']);
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

                  if ($this->smtp_tipo == $sValue)
                  {
                      $this->_tmp_lookup_smtp_tipo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['smtp_tipo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['smtp_tipo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['smtp_tipo']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['smtp_tipo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['smtp_tipo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['smtp_tipo']['labList'] = $aLabel;
          }
   }

          //----- smtp_servidor
   function ajax_return_values_smtp_servidor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_servidor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_servidor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_servidor'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- smtp_puerto
   function ajax_return_values_smtp_puerto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_puerto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_puerto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_puerto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- smtp_usuario
   function ajax_return_values_smtp_usuario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_usuario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_usuario);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_usuario'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- smtp_password
   function ajax_return_values_smtp_password($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("smtp_password", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->smtp_password);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['smtp_password'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- contacto_nombre
   function ajax_return_values_contacto_nombre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contacto_nombre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contacto_nombre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contacto_nombre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- contacto_cargo
   function ajax_return_values_contacto_cargo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contacto_cargo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contacto_cargo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contacto_cargo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- contacto_correo
   function ajax_return_values_contacto_correo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contacto_correo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contacto_correo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contacto_correo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- contacto_celular
   function ajax_return_values_contacto_celular($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contacto_celular", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contacto_celular);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contacto_celular'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- contacto_fijo
   function ajax_return_values_contacto_fijo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contacto_fijo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contacto_fijo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contacto_fijo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- logo
   function ajax_return_values_logo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("logo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->logo);
              $aLookup = array();
   $out_logo = '';
   $out1_logo = '';
   if ($this->logo != "" && $this->logo != "none")   
   { 
       $path_logo = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . "/" . $this->logo;
       $md5_logo  = md5("/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . $this->logo);
       nm_fix_SubDirUpload($this->logo,$this->Ini->root . $this->Ini->path_imagens,"/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/");
        if (is_file($path_logo))  
       { 
           $NM_ler_img = true;
           $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $md5_logo . ".gif" ;  
           $out1_logo = $out_logo; 
           if (is_file($this->Ini->root . $out_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_logo = fopen($path_logo, "r") ; 
               $reg_logo = fread($tmp_logo, filesize($path_logo)) ; 
               fclose($tmp_logo) ;  
               $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
               fwrite($arq_logo, $reg_logo) ;  
               fclose($arq_logo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_logo, true);
           $this->nmgp_return_img['logo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['logo'][1] = $sc_obj_img->getWidth();
           $NM_redim_img = true;
           $md5_logo  = md5($this->logo);
           $out_logo = $this->Ini->path_imag_temp . "/sc_logo_200200" . $md5_logo . ".gif" ;  
           if (is_file($this->Ini->root . $out_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_redim_img = false;
               } 
           } 
           if ($NM_redim_img) 
           { 
               if (!$this->Ini->Gd_missing)
               { 
                   $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_logo, true);
                   $sc_obj_img->setWidth(200);
                   $sc_obj_img->setHeight(200);
                   $sc_obj_img->setManterAspecto(true);
                   $sc_obj_img->createImg($this->Ini->root . $out_logo);
               } 
               else 
               { 
                   $out_logo = $out1_logo;
               } 
           } 
       } 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['logo'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($sTmpValue),
               'imgFile' => $out_logo,
               'imgOrig' => $out1_logo,
               'keepImg' => $sKeepImage,
               'hideName' => 'S',
              );
          }
   }

          //----- asunto
   function ajax_return_values_asunto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("asunto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->asunto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['asunto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- mensaje
   function ajax_return_values_mensaje($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mensaje", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mensaje);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mensaje'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- head_note
   function ajax_return_values_head_note($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("head_note", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->head_note);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['head_note'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pie_pagina
   function ajax_return_values_pie_pagina($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pie_pagina", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pie_pagina);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pie_pagina'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- mensaje_nc
   function ajax_return_values_mensaje_nc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mensaje_nc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mensaje_nc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mensaje_nc'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pie_pagina_nc
   function ajax_return_values_pie_pagina_nc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pie_pagina_nc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pie_pagina_nc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pie_pagina_nc'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- servidor_facturas
   function ajax_return_values_servidor_facturas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor_facturas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor_facturas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor_facturas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- servidor_nc
   function ajax_return_values_servidor_nc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servidor_nc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servidor_nc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servidor_nc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- correo_para_prueba
   function ajax_return_values_correo_para_prueba($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("correo_para_prueba", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->correo_para_prueba);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['correo_para_prueba'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- correo_prueba
   function ajax_return_values_correo_prueba($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("correo_prueba", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->correo_prueba);
              $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__mail_forward_32.png"))
          { 
              $correo_prueba = "&nbsp;" ;  
          } 
          else 
          { 
              $correo_prueba = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/scriptcase__NM__ico__NM__mail_forward_32.png\"/>" ; 
          } 
    $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_blank_prueba_mail . "', '$this->nm_location', 'gidempresa*scin" . $this->nmgp_dados_form['id_empresa'] . "*scout', '', '_blank', '0', '0', 'blank_prueba_mail')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $correo_prueba . "</font></a>";
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['correo_prueba'] = array(
                       'row'    => '',
               'type'    => 'imagehtml',
               'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
              );
          }
   }

          //----- enviar_datos_establecimiento
   function ajax_return_values_enviar_datos_establecimiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enviar_datos_establecimiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enviar_datos_establecimiento);
              $aLookup = array();
              $this->_tmp_lookup_enviar_datos_establecimiento = $this->enviar_datos_establecimiento;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_enviar_datos_establecimiento'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['enviar_datos_establecimiento']) && !empty($this->NM_ajax_info['select_html']['enviar_datos_establecimiento']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['enviar_datos_establecimiento']);
          }
          $this->NM_ajax_info['fldList']['enviar_datos_establecimiento'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-enviar_datos_establecimiento',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['enviar_datos_establecimiento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['enviar_datos_establecimiento']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['enviar_datos_establecimiento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['enviar_datos_establecimiento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['enviar_datos_establecimiento']['labList'] = $aLabel;
          }
   }

          //----- nombre_pc_red
   function ajax_return_values_nombre_pc_red($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombre_pc_red", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nombre_pc_red);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nombre_pc_red'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- sumarimpuestosdeldetalle
   function ajax_return_values_sumarimpuestosdeldetalle($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sumarimpuestosdeldetalle", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sumarimpuestosdeldetalle);
              $aLookup = array();
              $this->_tmp_lookup_sumarimpuestosdeldetalle = $this->sumarimpuestosdeldetalle;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_sumarimpuestosdeldetalle'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['sumarimpuestosdeldetalle']) && !empty($this->NM_ajax_info['select_html']['sumarimpuestosdeldetalle']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['sumarimpuestosdeldetalle']);
          }
          $this->NM_ajax_info['fldList']['sumarimpuestosdeldetalle'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-sumarimpuestosdeldetalle',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sumarimpuestosdeldetalle']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sumarimpuestosdeldetalle']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sumarimpuestosdeldetalle']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sumarimpuestosdeldetalle']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sumarimpuestosdeldetalle']['labList'] = $aLabel;
          }
   }

          //----- cantidaddecimales
   function ajax_return_values_cantidaddecimales($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cantidaddecimales", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cantidaddecimales);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cantidaddecimales'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- valortributounidad
   function ajax_return_values_valortributounidad($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valortributounidad", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->valortributounidad);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['valortributounidad'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- conf_auto_tercero
   function ajax_return_values_conf_auto_tercero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("conf_auto_tercero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->conf_auto_tercero);
              $aLookup = array();
              $this->_tmp_lookup_conf_auto_tercero = $this->conf_auto_tercero;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_conf_auto_tercero'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['conf_auto_tercero']) && !empty($this->NM_ajax_info['select_html']['conf_auto_tercero']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['conf_auto_tercero']);
          }
          $this->NM_ajax_info['fldList']['conf_auto_tercero'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-conf_auto_tercero',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['conf_auto_tercero']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['conf_auto_tercero']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['conf_auto_tercero']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['conf_auto_tercero']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['conf_auto_tercero']['labList'] = $aLabel;
          }
   }

          //----- no_validar_mail
   function ajax_return_values_no_validar_mail($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("no_validar_mail", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->no_validar_mail);
              $aLookup = array();
              $this->_tmp_lookup_no_validar_mail = $this->no_validar_mail;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_no_validar_mail'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['no_validar_mail']) && !empty($this->NM_ajax_info['select_html']['no_validar_mail']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['no_validar_mail']);
          }
          $this->NM_ajax_info['fldList']['no_validar_mail'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-no_validar_mail',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['no_validar_mail']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['no_validar_mail']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['no_validar_mail']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['no_validar_mail']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['no_validar_mail']['labList'] = $aLabel;
          }
   }

          //----- email_alternativo
   function ajax_return_values_email_alternativo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email_alternativo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->email_alternativo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['email_alternativo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- desviar_correo_a
   function ajax_return_values_desviar_correo_a($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("desviar_correo_a", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->desviar_correo_a);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['desviar_correo_a'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- correo_copia
   function ajax_return_values_correo_copia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("correo_copia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->correo_copia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['correo_copia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- informacion_adicional
   function ajax_return_values_informacion_adicional($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("informacion_adicional", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->informacion_adicional);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['informacion_adicional'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tomar_municipio_tns
   function ajax_return_values_tomar_municipio_tns($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tomar_municipio_tns", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tomar_municipio_tns);
              $aLookup = array();
              $this->_tmp_lookup_tomar_municipio_tns = $this->tomar_municipio_tns;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_tomar_municipio_tns'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['tomar_municipio_tns']) && !empty($this->NM_ajax_info['select_html']['tomar_municipio_tns']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['tomar_municipio_tns']);
          }
          $this->NM_ajax_info['fldList']['tomar_municipio_tns'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-tomar_municipio_tns',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tomar_municipio_tns']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tomar_municipio_tns']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tomar_municipio_tns']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tomar_municipio_tns']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tomar_municipio_tns']['labList'] = $aLabel;
          }
   }

          //----- validar_codcliente_tns
   function ajax_return_values_validar_codcliente_tns($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("validar_codcliente_tns", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->validar_codcliente_tns);
              $aLookup = array();
              $this->_tmp_lookup_validar_codcliente_tns = $this->validar_codcliente_tns;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_validar_codcliente_tns'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['validar_codcliente_tns']) && !empty($this->NM_ajax_info['select_html']['validar_codcliente_tns']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['validar_codcliente_tns']);
          }
          $this->NM_ajax_info['fldList']['validar_codcliente_tns'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-validar_codcliente_tns',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['validar_codcliente_tns']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['validar_codcliente_tns']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['validar_codcliente_tns']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['validar_codcliente_tns']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['validar_codcliente_tns']['labList'] = $aLabel;
          }
   }

          //----- desactivar_xml_enlista
   function ajax_return_values_desactivar_xml_enlista($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("desactivar_xml_enlista", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->desactivar_xml_enlista);
              $aLookup = array();
              $this->_tmp_lookup_desactivar_xml_enlista = $this->desactivar_xml_enlista;

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_desactivar_xml_enlista'][] = 'SI';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['desactivar_xml_enlista']) && !empty($this->NM_ajax_info['select_html']['desactivar_xml_enlista']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['desactivar_xml_enlista']);
          }
          $this->NM_ajax_info['fldList']['desactivar_xml_enlista'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'switch'  => true,
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-desactivar_xml_enlista',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['desactivar_xml_enlista']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['desactivar_xml_enlista']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['desactivar_xml_enlista']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['desactivar_xml_enlista']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['desactivar_xml_enlista']['labList'] = $aLabel;
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

$aLookup[] = array(form_cloud_empresas_mob_pack_protect_string('SI') => str_replace('<', '&lt;',form_cloud_empresas_mob_pack_protect_string("SI")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['Lookup_validar_correo_enlinea'][] = 'SI';
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
              $this->NM_ajax_info['fldList']['validar_correo_enlinea']['valList'][$i] = form_cloud_empresas_mob_pack_protect_string($v);
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

          //----- url_bouncer
   function ajax_return_values_url_bouncer($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("url_bouncer", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->url_bouncer);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['url_bouncer'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- apikey_bouncer
   function ajax_return_values_apikey_bouncer($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("apikey_bouncer", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->apikey_bouncer);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['apikey_bouncer'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tiempo_bouncer
   function ajax_return_values_tiempo_bouncer($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tiempo_bouncer", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tiempo_bouncer);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tiempo_bouncer'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- url_validar_licencia
   function ajax_return_values_url_validar_licencia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("url_validar_licencia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->url_validar_licencia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['url_validar_licencia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['upload_dir'][$fieldName][] = $newName;
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
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((id_empresa < $this->id_empresa))";
      if ('' != $sc_where)
      {
          if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
          {
              $sc_where = substr(trim($sc_where), 6);
          }
          if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
          {
              $sc_where = substr(trim($sc_where), 4);
          }
          $sc_where_pos .= ' AND (' . $sc_where . ')';
          $sc_where = ' WHERE ' . $sc_where;
      }
      if ('' != $this->id_empresa)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start'] = $rsc->fields[0];
          $rsc->Close();
      }
   }

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
      $NM_val_form['id_empresa'] = $this->id_empresa;
      $NM_val_form['ccnit'] = $this->ccnit;
      $NM_val_form['nombre_razonsocial'] = $this->nombre_razonsocial;
      $NM_val_form['serial'] = $this->serial;
      $NM_val_form['activo'] = $this->activo;
      $NM_val_form['nit'] = $this->nit;
      $NM_val_form['razon_social'] = $this->razon_social;
      $NM_val_form['celular'] = $this->celular;
      $NM_val_form['correo'] = $this->correo;
      $NM_val_form['codsucursal'] = $this->codsucursal;
      $NM_val_form['direccion'] = $this->direccion;
      $NM_val_form['ciudad'] = $this->ciudad;
      $NM_val_form['pagina_web'] = $this->pagina_web;
      $NM_val_form['actividad_principal'] = $this->actividad_principal;
      $NM_val_form['regimen'] = $this->regimen;
      $NM_val_form['observaciones'] = $this->observaciones;
      $NM_val_form['proveedor'] = $this->proveedor;
      $NM_val_form['modo'] = $this->modo;
      $NM_val_form['enviar_dian'] = $this->enviar_dian;
      $NM_val_form['enviar_cliente'] = $this->enviar_cliente;
      $NM_val_form['servidor1'] = $this->servidor1;
      $NM_val_form['servidor2'] = $this->servidor2;
      $NM_val_form['servidor3'] = $this->servidor3;
      $NM_val_form['tokenempresa'] = $this->tokenempresa;
      $NM_val_form['tokenpassword'] = $this->tokenpassword;
      $NM_val_form['servidor1_pruebas'] = $this->servidor1_pruebas;
      $NM_val_form['servidor2_pruebas'] = $this->servidor2_pruebas;
      $NM_val_form['servidor3_pruebas'] = $this->servidor3_pruebas;
      $NM_val_form['token_pruebas'] = $this->token_pruebas;
      $NM_val_form['password_pruebas'] = $this->password_pruebas;
      $NM_val_form['enviar_documento_online'] = $this->enviar_documento_online;
      $NM_val_form['smtp_tipo'] = $this->smtp_tipo;
      $NM_val_form['smtp_servidor'] = $this->smtp_servidor;
      $NM_val_form['smtp_puerto'] = $this->smtp_puerto;
      $NM_val_form['smtp_usuario'] = $this->smtp_usuario;
      $NM_val_form['smtp_password'] = $this->smtp_password;
      $NM_val_form['contacto_nombre'] = $this->contacto_nombre;
      $NM_val_form['contacto_cargo'] = $this->contacto_cargo;
      $NM_val_form['contacto_correo'] = $this->contacto_correo;
      $NM_val_form['contacto_celular'] = $this->contacto_celular;
      $NM_val_form['contacto_fijo'] = $this->contacto_fijo;
      $NM_val_form['logo'] = $this->logo;
      $NM_val_form['asunto'] = $this->asunto;
      $NM_val_form['mensaje'] = $this->mensaje;
      $NM_val_form['head_note'] = $this->head_note;
      $NM_val_form['pie_pagina'] = $this->pie_pagina;
      $NM_val_form['mensaje_nc'] = $this->mensaje_nc;
      $NM_val_form['pie_pagina_nc'] = $this->pie_pagina_nc;
      $NM_val_form['servidor_facturas'] = $this->servidor_facturas;
      $NM_val_form['servidor_nc'] = $this->servidor_nc;
      $NM_val_form['correo_para_prueba'] = $this->correo_para_prueba;
      $NM_val_form['correo_prueba'] = $this->correo_prueba;
      $NM_val_form['enviar_datos_establecimiento'] = $this->enviar_datos_establecimiento;
      $NM_val_form['nombre_pc_red'] = $this->nombre_pc_red;
      $NM_val_form['sumarimpuestosdeldetalle'] = $this->sumarimpuestosdeldetalle;
      $NM_val_form['cantidaddecimales'] = $this->cantidaddecimales;
      $NM_val_form['valortributounidad'] = $this->valortributounidad;
      $NM_val_form['conf_auto_tercero'] = $this->conf_auto_tercero;
      $NM_val_form['no_validar_mail'] = $this->no_validar_mail;
      $NM_val_form['email_alternativo'] = $this->email_alternativo;
      $NM_val_form['desviar_correo_a'] = $this->desviar_correo_a;
      $NM_val_form['correo_copia'] = $this->correo_copia;
      $NM_val_form['informacion_adicional'] = $this->informacion_adicional;
      $NM_val_form['tomar_municipio_tns'] = $this->tomar_municipio_tns;
      $NM_val_form['validar_codcliente_tns'] = $this->validar_codcliente_tns;
      $NM_val_form['desactivar_xml_enlista'] = $this->desactivar_xml_enlista;
      $NM_val_form['validar_correo_enlinea'] = $this->validar_correo_enlinea;
      $NM_val_form['url_bouncer'] = $this->url_bouncer;
      $NM_val_form['apikey_bouncer'] = $this->apikey_bouncer;
      $NM_val_form['tiempo_bouncer'] = $this->tiempo_bouncer;
      $NM_val_form['url_validar_licencia'] = $this->url_validar_licencia;
      $NM_val_form['creado'] = $this->creado;
      $NM_val_form['editado'] = $this->editado;
      if ($this->id_empresa === "" || is_null($this->id_empresa))  
      { 
          $this->id_empresa = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->cantidaddecimales === "" || is_null($this->cantidaddecimales))  
      { 
          $this->cantidaddecimales = 0;
          $this->sc_force_zero[] = 'cantidaddecimales';
      } 
      if ($this->smtp_puerto === "" || is_null($this->smtp_puerto))  
      { 
          $this->smtp_puerto = 0;
          $this->sc_force_zero[] = 'smtp_puerto';
      } 
      if ($this->enviar_dian === "" || is_null($this->enviar_dian))  
      { 
          $this->enviar_dian = 0;
          $this->sc_force_zero[] = 'enviar_dian';
      } 
      if ($this->enviar_cliente === "" || is_null($this->enviar_cliente))  
      { 
          $this->enviar_cliente = 0;
          $this->sc_force_zero[] = 'enviar_cliente';
      } 
      if ($this->tiempo_bouncer === "" || is_null($this->tiempo_bouncer))  
      { 
          $this->tiempo_bouncer = 0;
          $this->sc_force_zero[] = 'tiempo_bouncer';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->ccnit_before_qstr = $this->ccnit;
          $this->ccnit = substr($this->Db->qstr($this->ccnit), 1, -1); 
          if ($this->ccnit == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ccnit = "null"; 
              $NM_val_null[] = "ccnit";
          } 
          $this->nombre_razonsocial_before_qstr = $this->nombre_razonsocial;
          $this->nombre_razonsocial = substr($this->Db->qstr($this->nombre_razonsocial), 1, -1); 
          if ($this->nombre_razonsocial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_razonsocial = "null"; 
              $NM_val_null[] = "nombre_razonsocial";
          } 
          $this->celular_before_qstr = $this->celular;
          $this->celular = substr($this->Db->qstr($this->celular), 1, -1); 
          if ($this->celular == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->celular = "null"; 
              $NM_val_null[] = "celular";
          } 
          $this->correo_before_qstr = $this->correo;
          $this->correo = substr($this->Db->qstr($this->correo), 1, -1); 
          if ($this->correo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->correo = "null"; 
              $NM_val_null[] = "correo";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->activo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->activo = "null"; 
                  $NM_val_null[] = "activo";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->creado == "")  
              { 
                  $this->creado = "null"; 
                  $NM_val_null[] = "creado";
              } 
              if ($this->creado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->creado = "null"; 
                  $NM_val_null[] = "creado";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->editado == "")  
              { 
                  $this->editado = "null"; 
                  $NM_val_null[] = "editado";
              } 
              if ($this->editado == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->editado = "null"; 
                  $NM_val_null[] = "editado";
              } 
          }
          $this->codsucursal_before_qstr = $this->codsucursal;
          $this->codsucursal = substr($this->Db->qstr($this->codsucursal), 1, -1); 
          if ($this->codsucursal == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codsucursal = "null"; 
              $NM_val_null[] = "codsucursal";
          } 
          $this->valortributounidad_before_qstr = $this->valortributounidad;
          $this->valortributounidad = substr($this->Db->qstr($this->valortributounidad), 1, -1); 
          if ($this->valortributounidad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->valortributounidad = "null"; 
              $NM_val_null[] = "valortributounidad";
          } 
          $this->observaciones_before_qstr = $this->observaciones;
          $this->observaciones = substr($this->Db->qstr($this->observaciones), 1, -1); 
          if ($this->observaciones == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones = "null"; 
              $NM_val_null[] = "observaciones";
          } 
          if ($this->conf_auto_tercero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->conf_auto_tercero = "null"; 
              $NM_val_null[] = "conf_auto_tercero";
          } 
          if ($this->no_validar_mail == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->no_validar_mail = "null"; 
              $NM_val_null[] = "no_validar_mail";
          } 
          $this->email_alternativo_before_qstr = $this->email_alternativo;
          $this->email_alternativo = substr($this->Db->qstr($this->email_alternativo), 1, -1); 
          if ($this->email_alternativo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->email_alternativo = "null"; 
              $NM_val_null[] = "email_alternativo";
          } 
          $this->servidor1_before_qstr = $this->servidor1;
          $this->servidor1 = substr($this->Db->qstr($this->servidor1), 1, -1); 
          if ($this->servidor1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor1 = "null"; 
              $NM_val_null[] = "servidor1";
          } 
          $this->servidor2_before_qstr = $this->servidor2;
          $this->servidor2 = substr($this->Db->qstr($this->servidor2), 1, -1); 
          if ($this->servidor2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor2 = "null"; 
              $NM_val_null[] = "servidor2";
          } 
          $this->servidor3_before_qstr = $this->servidor3;
          $this->servidor3 = substr($this->Db->qstr($this->servidor3), 1, -1); 
          if ($this->servidor3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor3 = "null"; 
              $NM_val_null[] = "servidor3";
          } 
          $this->tokenempresa_before_qstr = $this->tokenempresa;
          $this->tokenempresa = substr($this->Db->qstr($this->tokenempresa), 1, -1); 
          if ($this->tokenempresa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tokenempresa = "null"; 
              $NM_val_null[] = "tokenempresa";
          } 
          $this->tokenpassword_before_qstr = $this->tokenpassword;
          $this->tokenpassword = substr($this->Db->qstr($this->tokenpassword), 1, -1); 
          if ($this->tokenpassword == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tokenpassword = "null"; 
              $NM_val_null[] = "tokenpassword";
          } 
          $this->servidor1_pruebas_before_qstr = $this->servidor1_pruebas;
          $this->servidor1_pruebas = substr($this->Db->qstr($this->servidor1_pruebas), 1, -1); 
          if ($this->servidor1_pruebas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor1_pruebas = "null"; 
              $NM_val_null[] = "servidor1_pruebas";
          } 
          $this->servidor2_pruebas_before_qstr = $this->servidor2_pruebas;
          $this->servidor2_pruebas = substr($this->Db->qstr($this->servidor2_pruebas), 1, -1); 
          if ($this->servidor2_pruebas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor2_pruebas = "null"; 
              $NM_val_null[] = "servidor2_pruebas";
          } 
          $this->servidor3_pruebas_before_qstr = $this->servidor3_pruebas;
          $this->servidor3_pruebas = substr($this->Db->qstr($this->servidor3_pruebas), 1, -1); 
          if ($this->servidor3_pruebas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor3_pruebas = "null"; 
              $NM_val_null[] = "servidor3_pruebas";
          } 
          $this->token_pruebas_before_qstr = $this->token_pruebas;
          $this->token_pruebas = substr($this->Db->qstr($this->token_pruebas), 1, -1); 
          if ($this->token_pruebas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->token_pruebas = "null"; 
              $NM_val_null[] = "token_pruebas";
          } 
          $this->password_pruebas_before_qstr = $this->password_pruebas;
          $this->password_pruebas = substr($this->Db->qstr($this->password_pruebas), 1, -1); 
          if ($this->password_pruebas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->password_pruebas = "null"; 
              $NM_val_null[] = "password_pruebas";
          } 
          $this->modo_before_qstr = $this->modo;
          $this->modo = substr($this->Db->qstr($this->modo), 1, -1); 
          if ($this->modo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->modo = "null"; 
              $NM_val_null[] = "modo";
          } 
          $this->smtp_servidor_before_qstr = $this->smtp_servidor;
          $this->smtp_servidor = substr($this->Db->qstr($this->smtp_servidor), 1, -1); 
          if ($this->smtp_servidor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->smtp_servidor = "null"; 
              $NM_val_null[] = "smtp_servidor";
          } 
          $this->smtp_usuario_before_qstr = $this->smtp_usuario;
          $this->smtp_usuario = substr($this->Db->qstr($this->smtp_usuario), 1, -1); 
          if ($this->smtp_usuario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->smtp_usuario = "null"; 
              $NM_val_null[] = "smtp_usuario";
          } 
          $this->smtp_password_before_qstr = $this->smtp_password;
          $this->smtp_password = substr($this->Db->qstr($this->smtp_password), 1, -1); 
          if ($this->smtp_password == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->smtp_password = "null"; 
              $NM_val_null[] = "smtp_password";
          } 
          $this->smtp_tipo_before_qstr = $this->smtp_tipo;
          $this->smtp_tipo = substr($this->Db->qstr($this->smtp_tipo), 1, -1); 
          if ($this->smtp_tipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->smtp_tipo = "null"; 
              $NM_val_null[] = "smtp_tipo";
          } 
          $this->asunto_before_qstr = $this->asunto;
          $this->asunto = substr($this->Db->qstr($this->asunto), 1, -1); 
          if ($this->asunto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->asunto = "null"; 
              $NM_val_null[] = "asunto";
          } 
          $this->mensaje_before_qstr = $this->mensaje;
          $this->mensaje = substr($this->Db->qstr($this->mensaje), 1, -1); 
          if ($this->mensaje == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mensaje = "null"; 
              $NM_val_null[] = "mensaje";
          } 
          $this->correo_para_prueba_before_qstr = $this->correo_para_prueba;
          $this->correo_para_prueba = substr($this->Db->qstr($this->correo_para_prueba), 1, -1); 
          if ($this->correo_para_prueba == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->correo_para_prueba = "null"; 
              $NM_val_null[] = "correo_para_prueba";
          } 
          $this->logo_before_qstr = $this->logo;
          $this->logo = substr($this->Db->qstr($this->logo), 1, -1); 
          if ($this->logo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->logo = "null"; 
              $NM_val_null[] = "logo";
          } 
          if ($this->enviar_documento_online == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->enviar_documento_online = "null"; 
              $NM_val_null[] = "enviar_documento_online";
          } 
          $this->contacto_nombre_before_qstr = $this->contacto_nombre;
          $this->contacto_nombre = substr($this->Db->qstr($this->contacto_nombre), 1, -1); 
          if ($this->contacto_nombre == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto_nombre = "null"; 
              $NM_val_null[] = "contacto_nombre";
          } 
          $this->contacto_cargo_before_qstr = $this->contacto_cargo;
          $this->contacto_cargo = substr($this->Db->qstr($this->contacto_cargo), 1, -1); 
          if ($this->contacto_cargo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto_cargo = "null"; 
              $NM_val_null[] = "contacto_cargo";
          } 
          $this->contacto_correo_before_qstr = $this->contacto_correo;
          $this->contacto_correo = substr($this->Db->qstr($this->contacto_correo), 1, -1); 
          if ($this->contacto_correo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto_correo = "null"; 
              $NM_val_null[] = "contacto_correo";
          } 
          $this->contacto_celular_before_qstr = $this->contacto_celular;
          $this->contacto_celular = substr($this->Db->qstr($this->contacto_celular), 1, -1); 
          if ($this->contacto_celular == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto_celular = "null"; 
              $NM_val_null[] = "contacto_celular";
          } 
          $this->contacto_fijo_before_qstr = $this->contacto_fijo;
          $this->contacto_fijo = substr($this->Db->qstr($this->contacto_fijo), 1, -1); 
          if ($this->contacto_fijo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto_fijo = "null"; 
              $NM_val_null[] = "contacto_fijo";
          } 
          $this->servidor_facturas_before_qstr = $this->servidor_facturas;
          $this->servidor_facturas = substr($this->Db->qstr($this->servidor_facturas), 1, -1); 
          if ($this->servidor_facturas == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor_facturas = "null"; 
              $NM_val_null[] = "servidor_facturas";
          } 
          $this->correo_copia_before_qstr = $this->correo_copia;
          $this->correo_copia = substr($this->Db->qstr($this->correo_copia), 1, -1); 
          if ($this->correo_copia == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->correo_copia = "null"; 
              $NM_val_null[] = "correo_copia";
          } 
          $this->direccion_before_qstr = $this->direccion;
          $this->direccion = substr($this->Db->qstr($this->direccion), 1, -1); 
          if ($this->direccion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direccion = "null"; 
              $NM_val_null[] = "direccion";
          } 
          $this->ciudad_before_qstr = $this->ciudad;
          $this->ciudad = substr($this->Db->qstr($this->ciudad), 1, -1); 
          if ($this->ciudad == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ciudad = "null"; 
              $NM_val_null[] = "ciudad";
          } 
          $this->pagina_web_before_qstr = $this->pagina_web;
          $this->pagina_web = substr($this->Db->qstr($this->pagina_web), 1, -1); 
          if ($this->pagina_web == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pagina_web = "null"; 
              $NM_val_null[] = "pagina_web";
          } 
          $this->actividad_principal_before_qstr = $this->actividad_principal;
          $this->actividad_principal = substr($this->Db->qstr($this->actividad_principal), 1, -1); 
          if ($this->actividad_principal == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->actividad_principal = "null"; 
              $NM_val_null[] = "actividad_principal";
          } 
          $this->regimen_before_qstr = $this->regimen;
          $this->regimen = substr($this->Db->qstr($this->regimen), 1, -1); 
          if ($this->regimen == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->regimen = "null"; 
              $NM_val_null[] = "regimen";
          } 
          $this->desviar_correo_a_before_qstr = $this->desviar_correo_a;
          $this->desviar_correo_a = substr($this->Db->qstr($this->desviar_correo_a), 1, -1); 
          if ($this->desviar_correo_a == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->desviar_correo_a = "null"; 
              $NM_val_null[] = "desviar_correo_a";
          } 
          $this->pie_pagina_before_qstr = $this->pie_pagina;
          $this->pie_pagina = substr($this->Db->qstr($this->pie_pagina), 1, -1); 
          if ($this->pie_pagina == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pie_pagina = "null"; 
              $NM_val_null[] = "pie_pagina";
          } 
          $this->mensaje_nc_before_qstr = $this->mensaje_nc;
          $this->mensaje_nc = substr($this->Db->qstr($this->mensaje_nc), 1, -1); 
          if ($this->mensaje_nc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mensaje_nc = "null"; 
              $NM_val_null[] = "mensaje_nc";
          } 
          $this->pie_pagina_nc_before_qstr = $this->pie_pagina_nc;
          $this->pie_pagina_nc = substr($this->Db->qstr($this->pie_pagina_nc), 1, -1); 
          if ($this->pie_pagina_nc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pie_pagina_nc = "null"; 
              $NM_val_null[] = "pie_pagina_nc";
          } 
          $this->servidor_nc_before_qstr = $this->servidor_nc;
          $this->servidor_nc = substr($this->Db->qstr($this->servidor_nc), 1, -1); 
          if ($this->servidor_nc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->servidor_nc = "null"; 
              $NM_val_null[] = "servidor_nc";
          } 
          $this->informacion_adicional_before_qstr = $this->informacion_adicional;
          $this->informacion_adicional = substr($this->Db->qstr($this->informacion_adicional), 1, -1); 
          if ($this->informacion_adicional == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->informacion_adicional = "null"; 
              $NM_val_null[] = "informacion_adicional";
          } 
          if ($this->sumarimpuestosdeldetalle == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sumarimpuestosdeldetalle = "null"; 
              $NM_val_null[] = "sumarimpuestosdeldetalle";
          } 
          $this->serial_before_qstr = $this->serial;
          $this->serial = substr($this->Db->qstr($this->serial), 1, -1); 
          if ($this->serial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->serial = "null"; 
              $NM_val_null[] = "serial";
          } 
          $this->nombre_pc_red_before_qstr = $this->nombre_pc_red;
          $this->nombre_pc_red = substr($this->Db->qstr($this->nombre_pc_red), 1, -1); 
          if ($this->nombre_pc_red == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_pc_red = "null"; 
              $NM_val_null[] = "nombre_pc_red";
          } 
          $this->proveedor_before_qstr = $this->proveedor;
          $this->proveedor = substr($this->Db->qstr($this->proveedor), 1, -1); 
          if ($this->proveedor == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->proveedor = "null"; 
              $NM_val_null[] = "proveedor";
          } 
          $this->nit_before_qstr = $this->nit;
          $this->nit = substr($this->Db->qstr($this->nit), 1, -1); 
          if ($this->nit == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nit = "null"; 
              $NM_val_null[] = "nit";
          } 
          $this->razon_social_before_qstr = $this->razon_social;
          $this->razon_social = substr($this->Db->qstr($this->razon_social), 1, -1); 
          if ($this->razon_social == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->razon_social = "null"; 
              $NM_val_null[] = "razon_social";
          } 
          $this->head_note_before_qstr = $this->head_note;
          $this->head_note = substr($this->Db->qstr($this->head_note), 1, -1); 
          if ($this->head_note == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->head_note = "null"; 
              $NM_val_null[] = "head_note";
          } 
          if ($this->tomar_municipio_tns == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tomar_municipio_tns = "null"; 
              $NM_val_null[] = "tomar_municipio_tns";
          } 
          if ($this->validar_codcliente_tns == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->validar_codcliente_tns = "null"; 
              $NM_val_null[] = "validar_codcliente_tns";
          } 
          if ($this->desactivar_xml_enlista == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->desactivar_xml_enlista = "null"; 
              $NM_val_null[] = "desactivar_xml_enlista";
          } 
          if ($this->validar_correo_enlinea == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->validar_correo_enlinea = "null"; 
              $NM_val_null[] = "validar_correo_enlinea";
          } 
          $this->url_validar_licencia_before_qstr = $this->url_validar_licencia;
          $this->url_validar_licencia = substr($this->Db->qstr($this->url_validar_licencia), 1, -1); 
          if ($this->url_validar_licencia == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_validar_licencia = "null"; 
              $NM_val_null[] = "url_validar_licencia";
          } 
          $this->url_bouncer_before_qstr = $this->url_bouncer;
          $this->url_bouncer = substr($this->Db->qstr($this->url_bouncer), 1, -1); 
          if ($this->url_bouncer == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_bouncer = "null"; 
              $NM_val_null[] = "url_bouncer";
          } 
          $this->apikey_bouncer_before_qstr = $this->apikey_bouncer;
          $this->apikey_bouncer = substr($this->Db->qstr($this->apikey_bouncer), 1, -1); 
          if ($this->apikey_bouncer == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apikey_bouncer = "null"; 
              $NM_val_null[] = "apikey_bouncer";
          } 
          if ($this->enviar_datos_establecimiento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->enviar_datos_establecimiento = "null"; 
              $NM_val_null[] = "enviar_datos_establecimiento";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_cloud_empresas_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "ccnit = '$this->ccnit', nombre_razonsocial = '$this->nombre_razonsocial', celular = '$this->celular', correo = '$this->correo', activo = '$this->activo', codsucursal = '$this->codsucursal', cantidadDecimales = $this->cantidaddecimales, valorTributoUnidad = '$this->valortributounidad', observaciones = '$this->observaciones', conf_auto_tercero = '$this->conf_auto_tercero', no_validar_mail = '$this->no_validar_mail', email_alternativo = '$this->email_alternativo', servidor1 = '$this->servidor1', servidor2 = '$this->servidor2', servidor3 = '$this->servidor3', tokenempresa = '$this->tokenempresa', tokenpassword = '$this->tokenpassword', servidor1_pruebas = '$this->servidor1_pruebas', servidor2_pruebas = '$this->servidor2_pruebas', servidor3_pruebas = '$this->servidor3_pruebas', token_pruebas = '$this->token_pruebas', password_pruebas = '$this->password_pruebas', modo = '$this->modo', smtp_servidor = '$this->smtp_servidor', smtp_usuario = '$this->smtp_usuario', smtp_password = '$this->smtp_password', smtp_puerto = $this->smtp_puerto, smtp_tipo = '$this->smtp_tipo', asunto = '$this->asunto', mensaje = '$this->mensaje', correo_para_prueba = '$this->correo_para_prueba', enviar_documento_online = '$this->enviar_documento_online', contacto_nombre = '$this->contacto_nombre', contacto_cargo = '$this->contacto_cargo', contacto_correo = '$this->contacto_correo', contacto_celular = '$this->contacto_celular', contacto_fijo = '$this->contacto_fijo', servidor_facturas = '$this->servidor_facturas', correo_copia = '$this->correo_copia', direccion = '$this->direccion', ciudad = '$this->ciudad', pagina_web = '$this->pagina_web', actividad_principal = '$this->actividad_principal', regimen = '$this->regimen', desviar_correo_a = '$this->desviar_correo_a', pie_pagina = '$this->pie_pagina', mensaje_nc = '$this->mensaje_nc', pie_pagina_nc = '$this->pie_pagina_nc', servidor_nc = '$this->servidor_nc', informacion_adicional = '$this->informacion_adicional', sumarImpuestosDelDetalle = '$this->sumarimpuestosdeldetalle', serial = '$this->serial', nombre_pc_red = '$this->nombre_pc_red', proveedor = '$this->proveedor', enviar_dian = $this->enviar_dian, enviar_cliente = $this->enviar_cliente, nit = '$this->nit', razon_social = '$this->razon_social', head_note = '$this->head_note', tomar_municipio_tns = '$this->tomar_municipio_tns', validar_codcliente_tns = '$this->validar_codcliente_tns', desactivar_xml_enlista = '$this->desactivar_xml_enlista', validar_correo_enlinea = '$this->validar_correo_enlinea', url_validar_licencia = '$this->url_validar_licencia', url_bouncer = '$this->url_bouncer', apikey_bouncer = '$this->apikey_bouncer', tiempo_bouncer = $this->tiempo_bouncer, enviar_datos_establecimiento = '$this->enviar_datos_establecimiento'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ccnit = '$this->ccnit', nombre_razonsocial = '$this->nombre_razonsocial', celular = '$this->celular', correo = '$this->correo', activo = '$this->activo', codsucursal = '$this->codsucursal', cantidadDecimales = $this->cantidaddecimales, valorTributoUnidad = '$this->valortributounidad', observaciones = '$this->observaciones', conf_auto_tercero = '$this->conf_auto_tercero', no_validar_mail = '$this->no_validar_mail', email_alternativo = '$this->email_alternativo', servidor1 = '$this->servidor1', servidor2 = '$this->servidor2', servidor3 = '$this->servidor3', tokenempresa = '$this->tokenempresa', tokenpassword = '$this->tokenpassword', servidor1_pruebas = '$this->servidor1_pruebas', servidor2_pruebas = '$this->servidor2_pruebas', servidor3_pruebas = '$this->servidor3_pruebas', token_pruebas = '$this->token_pruebas', password_pruebas = '$this->password_pruebas', modo = '$this->modo', smtp_servidor = '$this->smtp_servidor', smtp_usuario = '$this->smtp_usuario', smtp_password = '$this->smtp_password', smtp_puerto = $this->smtp_puerto, smtp_tipo = '$this->smtp_tipo', asunto = '$this->asunto', mensaje = '$this->mensaje', correo_para_prueba = '$this->correo_para_prueba', enviar_documento_online = '$this->enviar_documento_online', contacto_nombre = '$this->contacto_nombre', contacto_cargo = '$this->contacto_cargo', contacto_correo = '$this->contacto_correo', contacto_celular = '$this->contacto_celular', contacto_fijo = '$this->contacto_fijo', servidor_facturas = '$this->servidor_facturas', correo_copia = '$this->correo_copia', direccion = '$this->direccion', ciudad = '$this->ciudad', pagina_web = '$this->pagina_web', actividad_principal = '$this->actividad_principal', regimen = '$this->regimen', desviar_correo_a = '$this->desviar_correo_a', pie_pagina = '$this->pie_pagina', mensaje_nc = '$this->mensaje_nc', pie_pagina_nc = '$this->pie_pagina_nc', servidor_nc = '$this->servidor_nc', informacion_adicional = '$this->informacion_adicional', sumarImpuestosDelDetalle = '$this->sumarimpuestosdeldetalle', serial = '$this->serial', nombre_pc_red = '$this->nombre_pc_red', proveedor = '$this->proveedor', enviar_dian = $this->enviar_dian, enviar_cliente = $this->enviar_cliente, nit = '$this->nit', razon_social = '$this->razon_social', head_note = '$this->head_note', tomar_municipio_tns = '$this->tomar_municipio_tns', validar_codcliente_tns = '$this->validar_codcliente_tns', desactivar_xml_enlista = '$this->desactivar_xml_enlista', validar_correo_enlinea = '$this->validar_correo_enlinea', url_validar_licencia = '$this->url_validar_licencia', url_bouncer = '$this->url_bouncer', apikey_bouncer = '$this->apikey_bouncer', tiempo_bouncer = $this->tiempo_bouncer, enviar_datos_establecimiento = '$this->enviar_datos_establecimiento'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ccnit = '$this->ccnit', nombre_razonsocial = '$this->nombre_razonsocial', celular = '$this->celular', correo = '$this->correo', activo = '$this->activo', codsucursal = '$this->codsucursal', cantidadDecimales = $this->cantidaddecimales, valorTributoUnidad = '$this->valortributounidad', observaciones = '$this->observaciones', conf_auto_tercero = '$this->conf_auto_tercero', no_validar_mail = '$this->no_validar_mail', email_alternativo = '$this->email_alternativo', servidor1 = '$this->servidor1', servidor2 = '$this->servidor2', servidor3 = '$this->servidor3', tokenempresa = '$this->tokenempresa', tokenpassword = '$this->tokenpassword', servidor1_pruebas = '$this->servidor1_pruebas', servidor2_pruebas = '$this->servidor2_pruebas', servidor3_pruebas = '$this->servidor3_pruebas', token_pruebas = '$this->token_pruebas', password_pruebas = '$this->password_pruebas', modo = '$this->modo', smtp_servidor = '$this->smtp_servidor', smtp_usuario = '$this->smtp_usuario', smtp_password = '$this->smtp_password', smtp_puerto = $this->smtp_puerto, smtp_tipo = '$this->smtp_tipo', asunto = '$this->asunto', mensaje = '$this->mensaje', correo_para_prueba = '$this->correo_para_prueba', enviar_documento_online = '$this->enviar_documento_online', contacto_nombre = '$this->contacto_nombre', contacto_cargo = '$this->contacto_cargo', contacto_correo = '$this->contacto_correo', contacto_celular = '$this->contacto_celular', contacto_fijo = '$this->contacto_fijo', servidor_facturas = '$this->servidor_facturas', correo_copia = '$this->correo_copia', direccion = '$this->direccion', ciudad = '$this->ciudad', pagina_web = '$this->pagina_web', actividad_principal = '$this->actividad_principal', regimen = '$this->regimen', desviar_correo_a = '$this->desviar_correo_a', pie_pagina = '$this->pie_pagina', mensaje_nc = '$this->mensaje_nc', pie_pagina_nc = '$this->pie_pagina_nc', servidor_nc = '$this->servidor_nc', informacion_adicional = '$this->informacion_adicional', sumarImpuestosDelDetalle = '$this->sumarimpuestosdeldetalle', serial = '$this->serial', nombre_pc_red = '$this->nombre_pc_red', proveedor = '$this->proveedor', enviar_dian = $this->enviar_dian, enviar_cliente = $this->enviar_cliente, nit = '$this->nit', razon_social = '$this->razon_social', head_note = '$this->head_note', tomar_municipio_tns = '$this->tomar_municipio_tns', validar_codcliente_tns = '$this->validar_codcliente_tns', desactivar_xml_enlista = '$this->desactivar_xml_enlista', validar_correo_enlinea = '$this->validar_correo_enlinea', url_validar_licencia = '$this->url_validar_licencia', url_bouncer = '$this->url_bouncer', apikey_bouncer = '$this->apikey_bouncer', tiempo_bouncer = $this->tiempo_bouncer, enviar_datos_establecimiento = '$this->enviar_datos_establecimiento'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "ccnit = '$this->ccnit', nombre_razonsocial = '$this->nombre_razonsocial', celular = '$this->celular', correo = '$this->correo', activo = '$this->activo', codsucursal = '$this->codsucursal', cantidadDecimales = $this->cantidaddecimales, valorTributoUnidad = '$this->valortributounidad', observaciones = '$this->observaciones', conf_auto_tercero = '$this->conf_auto_tercero', no_validar_mail = '$this->no_validar_mail', email_alternativo = '$this->email_alternativo', servidor1 = '$this->servidor1', servidor2 = '$this->servidor2', servidor3 = '$this->servidor3', tokenempresa = '$this->tokenempresa', tokenpassword = '$this->tokenpassword', servidor1_pruebas = '$this->servidor1_pruebas', servidor2_pruebas = '$this->servidor2_pruebas', servidor3_pruebas = '$this->servidor3_pruebas', token_pruebas = '$this->token_pruebas', password_pruebas = '$this->password_pruebas', modo = '$this->modo', smtp_servidor = '$this->smtp_servidor', smtp_usuario = '$this->smtp_usuario', smtp_password = '$this->smtp_password', smtp_puerto = $this->smtp_puerto, smtp_tipo = '$this->smtp_tipo', asunto = '$this->asunto', mensaje = '$this->mensaje', correo_para_prueba = '$this->correo_para_prueba', enviar_documento_online = '$this->enviar_documento_online', contacto_nombre = '$this->contacto_nombre', contacto_cargo = '$this->contacto_cargo', contacto_correo = '$this->contacto_correo', contacto_celular = '$this->contacto_celular', contacto_fijo = '$this->contacto_fijo', servidor_facturas = '$this->servidor_facturas', correo_copia = '$this->correo_copia', direccion = '$this->direccion', ciudad = '$this->ciudad', pagina_web = '$this->pagina_web', actividad_principal = '$this->actividad_principal', regimen = '$this->regimen', desviar_correo_a = '$this->desviar_correo_a', pie_pagina = '$this->pie_pagina', mensaje_nc = '$this->mensaje_nc', pie_pagina_nc = '$this->pie_pagina_nc', servidor_nc = '$this->servidor_nc', informacion_adicional = '$this->informacion_adicional', sumarImpuestosDelDetalle = '$this->sumarimpuestosdeldetalle', serial = '$this->serial', nombre_pc_red = '$this->nombre_pc_red', proveedor = '$this->proveedor', enviar_dian = $this->enviar_dian, enviar_cliente = $this->enviar_cliente, nit = '$this->nit', razon_social = '$this->razon_social', head_note = '$this->head_note', tomar_municipio_tns = '$this->tomar_municipio_tns', validar_codcliente_tns = '$this->validar_codcliente_tns', desactivar_xml_enlista = '$this->desactivar_xml_enlista', validar_correo_enlinea = '$this->validar_correo_enlinea', url_validar_licencia = '$this->url_validar_licencia', url_bouncer = '$this->url_bouncer', apikey_bouncer = '$this->apikey_bouncer', tiempo_bouncer = $this->tiempo_bouncer, enviar_datos_establecimiento = '$this->enviar_datos_establecimiento'"; 
              } 
              if (isset($NM_val_form['creado']) && $NM_val_form['creado'] != $this->nmgp_dados_select['creado']) 
              { 
                  $SC_fields_update[] = "creado = '$this->creado'"; 
              } 
              if (isset($NM_val_form['editado']) && $NM_val_form['editado'] != $this->nmgp_dados_select['editado']) 
              { 
                  $SC_fields_update[] = "editado = '$this->editado'"; 
              } 
              $aDoNotUpdate = array();
              $aEraseFiles  = array();
              $temp_cmd_sql = "";
              if ($this->logo_limpa == "S")
              {
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . "/";
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['logo']);
                  if ($this->logo != "null")
                  {
                      $this->logo = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                      $temp_cmd_sql = "logo = '" . $this->logo . "'";
                  }
                  else
                  {
                      $temp_cmd_sql = "logo = '" . $this->logo . "'";
                  }
                  $this->logo = "";
              }
              else
              {
                  if ($this->logo != "none" && $this->logo != "")
                  {
                      $NM_conteudo =  $this->logo;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      $temp_cmd_sql .= " logo = '$NM_conteudo'";
                      }
                      else
                      {
                          $temp_cmd_sql .= " logo = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "logo";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id_empresa = $this->id_empresa ";  
              }  
              else  
              {
                  $comando .= " WHERE id_empresa = $this->id_empresa ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
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
                                  form_cloud_empresas_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->ccnit = $this->ccnit_before_qstr;
              $this->nombre_razonsocial = $this->nombre_razonsocial_before_qstr;
              $this->celular = $this->celular_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->codsucursal = $this->codsucursal_before_qstr;
              $this->valortributounidad = $this->valortributounidad_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->email_alternativo = $this->email_alternativo_before_qstr;
              $this->servidor1 = $this->servidor1_before_qstr;
              $this->servidor2 = $this->servidor2_before_qstr;
              $this->servidor3 = $this->servidor3_before_qstr;
              $this->tokenempresa = $this->tokenempresa_before_qstr;
              $this->tokenpassword = $this->tokenpassword_before_qstr;
              $this->servidor1_pruebas = $this->servidor1_pruebas_before_qstr;
              $this->servidor2_pruebas = $this->servidor2_pruebas_before_qstr;
              $this->servidor3_pruebas = $this->servidor3_pruebas_before_qstr;
              $this->token_pruebas = $this->token_pruebas_before_qstr;
              $this->password_pruebas = $this->password_pruebas_before_qstr;
              $this->modo = $this->modo_before_qstr;
              $this->smtp_servidor = $this->smtp_servidor_before_qstr;
              $this->smtp_usuario = $this->smtp_usuario_before_qstr;
              $this->smtp_password = $this->smtp_password_before_qstr;
              $this->smtp_tipo = $this->smtp_tipo_before_qstr;
              $this->asunto = $this->asunto_before_qstr;
              $this->mensaje = $this->mensaje_before_qstr;
              $this->correo_para_prueba = $this->correo_para_prueba_before_qstr;
              $this->logo = $this->logo_before_qstr;
              $this->contacto_nombre = $this->contacto_nombre_before_qstr;
              $this->contacto_cargo = $this->contacto_cargo_before_qstr;
              $this->contacto_correo = $this->contacto_correo_before_qstr;
              $this->contacto_celular = $this->contacto_celular_before_qstr;
              $this->contacto_fijo = $this->contacto_fijo_before_qstr;
              $this->servidor_facturas = $this->servidor_facturas_before_qstr;
              $this->correo_copia = $this->correo_copia_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->ciudad = $this->ciudad_before_qstr;
              $this->pagina_web = $this->pagina_web_before_qstr;
              $this->actividad_principal = $this->actividad_principal_before_qstr;
              $this->regimen = $this->regimen_before_qstr;
              $this->desviar_correo_a = $this->desviar_correo_a_before_qstr;
              $this->pie_pagina = $this->pie_pagina_before_qstr;
              $this->mensaje_nc = $this->mensaje_nc_before_qstr;
              $this->pie_pagina_nc = $this->pie_pagina_nc_before_qstr;
              $this->servidor_nc = $this->servidor_nc_before_qstr;
              $this->informacion_adicional = $this->informacion_adicional_before_qstr;
              $this->serial = $this->serial_before_qstr;
              $this->nombre_pc_red = $this->nombre_pc_red_before_qstr;
              $this->proveedor = $this->proveedor_before_qstr;
              $this->nit = $this->nit_before_qstr;
              $this->razon_social = $this->razon_social_before_qstr;
              $this->head_note = $this->head_note_before_qstr;
              $this->url_validar_licencia = $this->url_validar_licencia_before_qstr;
              $this->url_bouncer = $this->url_bouncer_before_qstr;
              $this->apikey_bouncer = $this->apikey_bouncer_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              if ($this->logo_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['id_empresa'])) { $this->id_empresa = $NM_val_form['id_empresa']; }
              elseif (isset($this->id_empresa)) { $this->nm_limpa_alfa($this->id_empresa); }
              if     (isset($NM_val_form) && isset($NM_val_form['ccnit'])) { $this->ccnit = $NM_val_form['ccnit']; }
              elseif (isset($this->ccnit)) { $this->nm_limpa_alfa($this->ccnit); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_razonsocial'])) { $this->nombre_razonsocial = $NM_val_form['nombre_razonsocial']; }
              elseif (isset($this->nombre_razonsocial)) { $this->nm_limpa_alfa($this->nombre_razonsocial); }
              if     (isset($NM_val_form) && isset($NM_val_form['celular'])) { $this->celular = $NM_val_form['celular']; }
              elseif (isset($this->celular)) { $this->nm_limpa_alfa($this->celular); }
              if     (isset($NM_val_form) && isset($NM_val_form['correo'])) { $this->correo = $NM_val_form['correo']; }
              elseif (isset($this->correo)) { $this->nm_limpa_alfa($this->correo); }
              if     (isset($NM_val_form) && isset($NM_val_form['codsucursal'])) { $this->codsucursal = $NM_val_form['codsucursal']; }
              elseif (isset($this->codsucursal)) { $this->nm_limpa_alfa($this->codsucursal); }
              if     (isset($NM_val_form) && isset($NM_val_form['cantidaddecimales'])) { $this->cantidaddecimales = $NM_val_form['cantidaddecimales']; }
              elseif (isset($this->cantidaddecimales)) { $this->nm_limpa_alfa($this->cantidaddecimales); }
              if     (isset($NM_val_form) && isset($NM_val_form['valortributounidad'])) { $this->valortributounidad = $NM_val_form['valortributounidad']; }
              elseif (isset($this->valortributounidad)) { $this->nm_limpa_alfa($this->valortributounidad); }
              if     (isset($NM_val_form) && isset($NM_val_form['email_alternativo'])) { $this->email_alternativo = $NM_val_form['email_alternativo']; }
              elseif (isset($this->email_alternativo)) { $this->nm_limpa_alfa($this->email_alternativo); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor1'])) { $this->servidor1 = $NM_val_form['servidor1']; }
              elseif (isset($this->servidor1)) { $this->nm_limpa_alfa($this->servidor1); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor2'])) { $this->servidor2 = $NM_val_form['servidor2']; }
              elseif (isset($this->servidor2)) { $this->nm_limpa_alfa($this->servidor2); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor3'])) { $this->servidor3 = $NM_val_form['servidor3']; }
              elseif (isset($this->servidor3)) { $this->nm_limpa_alfa($this->servidor3); }
              if     (isset($NM_val_form) && isset($NM_val_form['tokenempresa'])) { $this->tokenempresa = $NM_val_form['tokenempresa']; }
              elseif (isset($this->tokenempresa)) { $this->nm_limpa_alfa($this->tokenempresa); }
              if     (isset($NM_val_form) && isset($NM_val_form['tokenpassword'])) { $this->tokenpassword = $NM_val_form['tokenpassword']; }
              elseif (isset($this->tokenpassword)) { $this->nm_limpa_alfa($this->tokenpassword); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor1_pruebas'])) { $this->servidor1_pruebas = $NM_val_form['servidor1_pruebas']; }
              elseif (isset($this->servidor1_pruebas)) { $this->nm_limpa_alfa($this->servidor1_pruebas); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor2_pruebas'])) { $this->servidor2_pruebas = $NM_val_form['servidor2_pruebas']; }
              elseif (isset($this->servidor2_pruebas)) { $this->nm_limpa_alfa($this->servidor2_pruebas); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor3_pruebas'])) { $this->servidor3_pruebas = $NM_val_form['servidor3_pruebas']; }
              elseif (isset($this->servidor3_pruebas)) { $this->nm_limpa_alfa($this->servidor3_pruebas); }
              if     (isset($NM_val_form) && isset($NM_val_form['token_pruebas'])) { $this->token_pruebas = $NM_val_form['token_pruebas']; }
              elseif (isset($this->token_pruebas)) { $this->nm_limpa_alfa($this->token_pruebas); }
              if     (isset($NM_val_form) && isset($NM_val_form['password_pruebas'])) { $this->password_pruebas = $NM_val_form['password_pruebas']; }
              elseif (isset($this->password_pruebas)) { $this->nm_limpa_alfa($this->password_pruebas); }
              if     (isset($NM_val_form) && isset($NM_val_form['modo'])) { $this->modo = $NM_val_form['modo']; }
              elseif (isset($this->modo)) { $this->nm_limpa_alfa($this->modo); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_servidor'])) { $this->smtp_servidor = $NM_val_form['smtp_servidor']; }
              elseif (isset($this->smtp_servidor)) { $this->nm_limpa_alfa($this->smtp_servidor); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_usuario'])) { $this->smtp_usuario = $NM_val_form['smtp_usuario']; }
              elseif (isset($this->smtp_usuario)) { $this->nm_limpa_alfa($this->smtp_usuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_password'])) { $this->smtp_password = $NM_val_form['smtp_password']; }
              elseif (isset($this->smtp_password)) { $this->nm_limpa_alfa($this->smtp_password); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_puerto'])) { $this->smtp_puerto = $NM_val_form['smtp_puerto']; }
              elseif (isset($this->smtp_puerto)) { $this->nm_limpa_alfa($this->smtp_puerto); }
              if     (isset($NM_val_form) && isset($NM_val_form['smtp_tipo'])) { $this->smtp_tipo = $NM_val_form['smtp_tipo']; }
              elseif (isset($this->smtp_tipo)) { $this->nm_limpa_alfa($this->smtp_tipo); }
              if     (isset($NM_val_form) && isset($NM_val_form['asunto'])) { $this->asunto = $NM_val_form['asunto']; }
              elseif (isset($this->asunto)) { $this->nm_limpa_alfa($this->asunto); }
              if     (isset($NM_val_form) && isset($NM_val_form['correo_para_prueba'])) { $this->correo_para_prueba = $NM_val_form['correo_para_prueba']; }
              elseif (isset($this->correo_para_prueba)) { $this->nm_limpa_alfa($this->correo_para_prueba); }
              if     (isset($NM_val_form) && isset($NM_val_form['contacto_nombre'])) { $this->contacto_nombre = $NM_val_form['contacto_nombre']; }
              elseif (isset($this->contacto_nombre)) { $this->nm_limpa_alfa($this->contacto_nombre); }
              if     (isset($NM_val_form) && isset($NM_val_form['contacto_cargo'])) { $this->contacto_cargo = $NM_val_form['contacto_cargo']; }
              elseif (isset($this->contacto_cargo)) { $this->nm_limpa_alfa($this->contacto_cargo); }
              if     (isset($NM_val_form) && isset($NM_val_form['contacto_correo'])) { $this->contacto_correo = $NM_val_form['contacto_correo']; }
              elseif (isset($this->contacto_correo)) { $this->nm_limpa_alfa($this->contacto_correo); }
              if     (isset($NM_val_form) && isset($NM_val_form['contacto_celular'])) { $this->contacto_celular = $NM_val_form['contacto_celular']; }
              elseif (isset($this->contacto_celular)) { $this->nm_limpa_alfa($this->contacto_celular); }
              if     (isset($NM_val_form) && isset($NM_val_form['contacto_fijo'])) { $this->contacto_fijo = $NM_val_form['contacto_fijo']; }
              elseif (isset($this->contacto_fijo)) { $this->nm_limpa_alfa($this->contacto_fijo); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor_facturas'])) { $this->servidor_facturas = $NM_val_form['servidor_facturas']; }
              elseif (isset($this->servidor_facturas)) { $this->nm_limpa_alfa($this->servidor_facturas); }
              if     (isset($NM_val_form) && isset($NM_val_form['correo_copia'])) { $this->correo_copia = $NM_val_form['correo_copia']; }
              elseif (isset($this->correo_copia)) { $this->nm_limpa_alfa($this->correo_copia); }
              if     (isset($NM_val_form) && isset($NM_val_form['direccion'])) { $this->direccion = $NM_val_form['direccion']; }
              elseif (isset($this->direccion)) { $this->nm_limpa_alfa($this->direccion); }
              if     (isset($NM_val_form) && isset($NM_val_form['ciudad'])) { $this->ciudad = $NM_val_form['ciudad']; }
              elseif (isset($this->ciudad)) { $this->nm_limpa_alfa($this->ciudad); }
              if     (isset($NM_val_form) && isset($NM_val_form['pagina_web'])) { $this->pagina_web = $NM_val_form['pagina_web']; }
              elseif (isset($this->pagina_web)) { $this->nm_limpa_alfa($this->pagina_web); }
              if     (isset($NM_val_form) && isset($NM_val_form['actividad_principal'])) { $this->actividad_principal = $NM_val_form['actividad_principal']; }
              elseif (isset($this->actividad_principal)) { $this->nm_limpa_alfa($this->actividad_principal); }
              if     (isset($NM_val_form) && isset($NM_val_form['regimen'])) { $this->regimen = $NM_val_form['regimen']; }
              elseif (isset($this->regimen)) { $this->nm_limpa_alfa($this->regimen); }
              if     (isset($NM_val_form) && isset($NM_val_form['desviar_correo_a'])) { $this->desviar_correo_a = $NM_val_form['desviar_correo_a']; }
              elseif (isset($this->desviar_correo_a)) { $this->nm_limpa_alfa($this->desviar_correo_a); }
              if     (isset($NM_val_form) && isset($NM_val_form['pie_pagina'])) { $this->pie_pagina = $NM_val_form['pie_pagina']; }
              elseif (isset($this->pie_pagina)) { $this->nm_limpa_alfa($this->pie_pagina); }
              if     (isset($NM_val_form) && isset($NM_val_form['pie_pagina_nc'])) { $this->pie_pagina_nc = $NM_val_form['pie_pagina_nc']; }
              elseif (isset($this->pie_pagina_nc)) { $this->nm_limpa_alfa($this->pie_pagina_nc); }
              if     (isset($NM_val_form) && isset($NM_val_form['servidor_nc'])) { $this->servidor_nc = $NM_val_form['servidor_nc']; }
              elseif (isset($this->servidor_nc)) { $this->nm_limpa_alfa($this->servidor_nc); }
              if     (isset($NM_val_form) && isset($NM_val_form['informacion_adicional'])) { $this->informacion_adicional = $NM_val_form['informacion_adicional']; }
              elseif (isset($this->informacion_adicional)) { $this->nm_limpa_alfa($this->informacion_adicional); }
              if     (isset($NM_val_form) && isset($NM_val_form['serial'])) { $this->serial = $NM_val_form['serial']; }
              elseif (isset($this->serial)) { $this->nm_limpa_alfa($this->serial); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombre_pc_red'])) { $this->nombre_pc_red = $NM_val_form['nombre_pc_red']; }
              elseif (isset($this->nombre_pc_red)) { $this->nm_limpa_alfa($this->nombre_pc_red); }
              if     (isset($NM_val_form) && isset($NM_val_form['proveedor'])) { $this->proveedor = $NM_val_form['proveedor']; }
              elseif (isset($this->proveedor)) { $this->nm_limpa_alfa($this->proveedor); }
              if     (isset($NM_val_form) && isset($NM_val_form['enviar_dian'])) { $this->enviar_dian = $NM_val_form['enviar_dian']; }
              elseif (isset($this->enviar_dian)) { $this->nm_limpa_alfa($this->enviar_dian); }
              if     (isset($NM_val_form) && isset($NM_val_form['enviar_cliente'])) { $this->enviar_cliente = $NM_val_form['enviar_cliente']; }
              elseif (isset($this->enviar_cliente)) { $this->nm_limpa_alfa($this->enviar_cliente); }
              if     (isset($NM_val_form) && isset($NM_val_form['nit'])) { $this->nit = $NM_val_form['nit']; }
              elseif (isset($this->nit)) { $this->nm_limpa_alfa($this->nit); }
              if     (isset($NM_val_form) && isset($NM_val_form['razon_social'])) { $this->razon_social = $NM_val_form['razon_social']; }
              elseif (isset($this->razon_social)) { $this->nm_limpa_alfa($this->razon_social); }
              if     (isset($NM_val_form) && isset($NM_val_form['head_note'])) { $this->head_note = $NM_val_form['head_note']; }
              elseif (isset($this->head_note)) { $this->nm_limpa_alfa($this->head_note); }
              if     (isset($NM_val_form) && isset($NM_val_form['url_validar_licencia'])) { $this->url_validar_licencia = $NM_val_form['url_validar_licencia']; }
              elseif (isset($this->url_validar_licencia)) { $this->nm_limpa_alfa($this->url_validar_licencia); }
              if     (isset($NM_val_form) && isset($NM_val_form['url_bouncer'])) { $this->url_bouncer = $NM_val_form['url_bouncer']; }
              elseif (isset($this->url_bouncer)) { $this->nm_limpa_alfa($this->url_bouncer); }
              if     (isset($NM_val_form) && isset($NM_val_form['apikey_bouncer'])) { $this->apikey_bouncer = $NM_val_form['apikey_bouncer']; }
              elseif (isset($this->apikey_bouncer)) { $this->nm_limpa_alfa($this->apikey_bouncer); }
              if     (isset($NM_val_form) && isset($NM_val_form['tiempo_bouncer'])) { $this->tiempo_bouncer = $NM_val_form['tiempo_bouncer']; }
              elseif (isset($this->tiempo_bouncer)) { $this->nm_limpa_alfa($this->tiempo_bouncer); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_empresa', 'ccnit', 'nombre_razonsocial', 'serial', 'activo', 'nit', 'razon_social', 'celular', 'correo', 'codsucursal', 'direccion', 'ciudad', 'pagina_web', 'actividad_principal', 'regimen', 'observaciones', 'proveedor', 'modo', 'enviar_dian', 'enviar_cliente', 'servidor1', 'servidor2', 'servidor3', 'tokenempresa', 'tokenpassword', 'servidor1_pruebas', 'servidor2_pruebas', 'servidor3_pruebas', 'token_pruebas', 'password_pruebas', 'enviar_documento_online', 'smtp_tipo', 'smtp_servidor', 'smtp_puerto', 'smtp_usuario', 'smtp_password', 'contacto_nombre', 'contacto_cargo', 'contacto_correo', 'contacto_celular', 'contacto_fijo', 'logo', 'asunto', 'mensaje', 'head_note', 'pie_pagina', 'mensaje_nc', 'pie_pagina_nc', 'servidor_facturas', 'servidor_nc', 'correo_para_prueba', 'correo_prueba', 'enviar_datos_establecimiento', 'nombre_pc_red', 'sumarimpuestosdeldetalle', 'cantidaddecimales', 'valortributounidad', 'conf_auto_tercero', 'no_validar_mail', 'email_alternativo', 'desviar_correo_a', 'correo_copia', 'informacion_adicional', 'tomar_municipio_tns', 'validar_codcliente_tns', 'desactivar_xml_enlista', 'validar_correo_enlinea', 'url_bouncer', 'apikey_bouncer', 'tiempo_bouncer', 'url_validar_licencia'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id_empresa, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_cloud_empresas_mob_pack_ajax_response();
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
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ccnit, nombre_razonsocial, celular, correo, codsucursal, cantidadDecimales, valorTributoUnidad, observaciones, conf_auto_tercero, no_validar_mail, email_alternativo, servidor1, servidor2, servidor3, tokenempresa, tokenpassword, servidor1_pruebas, servidor2_pruebas, servidor3_pruebas, token_pruebas, password_pruebas, modo, smtp_servidor, smtp_usuario, smtp_password, smtp_puerto, smtp_tipo, asunto, mensaje, correo_para_prueba, logo, enviar_documento_online, contacto_nombre, contacto_cargo, contacto_correo, contacto_celular, contacto_fijo, servidor_facturas, correo_copia, direccion, ciudad, pagina_web, actividad_principal, regimen, desviar_correo_a, pie_pagina, mensaje_nc, pie_pagina_nc, servidor_nc, informacion_adicional, sumarImpuestosDelDetalle, serial, nombre_pc_red, proveedor, enviar_dian, enviar_cliente, nit, razon_social, head_note, tomar_municipio_tns, validar_codcliente_tns, desactivar_xml_enlista, validar_correo_enlinea, url_validar_licencia, url_bouncer, apikey_bouncer, tiempo_bouncer, enviar_datos_establecimiento $compl_insert) VALUES ('$this->ccnit', '$this->nombre_razonsocial', '$this->celular', '$this->correo', '$this->codsucursal', $this->cantidaddecimales, '$this->valortributounidad', '$this->observaciones', '$this->conf_auto_tercero', '$this->no_validar_mail', '$this->email_alternativo', '$this->servidor1', '$this->servidor2', '$this->servidor3', '$this->tokenempresa', '$this->tokenpassword', '$this->servidor1_pruebas', '$this->servidor2_pruebas', '$this->servidor3_pruebas', '$this->token_pruebas', '$this->password_pruebas', '$this->modo', '$this->smtp_servidor', '$this->smtp_usuario', '$this->smtp_password', $this->smtp_puerto, '$this->smtp_tipo', '$this->asunto', '$this->mensaje', '$this->correo_para_prueba', '$this->logo', '$this->enviar_documento_online', '$this->contacto_nombre', '$this->contacto_cargo', '$this->contacto_correo', '$this->contacto_celular', '$this->contacto_fijo', '$this->servidor_facturas', '$this->correo_copia', '$this->direccion', '$this->ciudad', '$this->pagina_web', '$this->actividad_principal', '$this->regimen', '$this->desviar_correo_a', '$this->pie_pagina', '$this->mensaje_nc', '$this->pie_pagina_nc', '$this->servidor_nc', '$this->informacion_adicional', '$this->sumarimpuestosdeldetalle', '$this->serial', '$this->nombre_pc_red', '$this->proveedor', $this->enviar_dian, $this->enviar_cliente, '$this->nit', '$this->razon_social', '$this->head_note', '$this->tomar_municipio_tns', '$this->validar_codcliente_tns', '$this->desactivar_xml_enlista', '$this->validar_correo_enlinea', '$this->url_validar_licencia', '$this->url_bouncer', '$this->apikey_bouncer', $this->tiempo_bouncer, '$this->enviar_datos_establecimiento' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ccnit, nombre_razonsocial, celular, correo, codsucursal, cantidadDecimales, valorTributoUnidad, observaciones, conf_auto_tercero, no_validar_mail, email_alternativo, servidor1, servidor2, servidor3, tokenempresa, tokenpassword, servidor1_pruebas, servidor2_pruebas, servidor3_pruebas, token_pruebas, password_pruebas, modo, smtp_servidor, smtp_usuario, smtp_password, smtp_puerto, smtp_tipo, asunto, mensaje, correo_para_prueba, logo, enviar_documento_online, contacto_nombre, contacto_cargo, contacto_correo, contacto_celular, contacto_fijo, servidor_facturas, correo_copia, direccion, ciudad, pagina_web, actividad_principal, regimen, desviar_correo_a, pie_pagina, mensaje_nc, pie_pagina_nc, servidor_nc, informacion_adicional, sumarImpuestosDelDetalle, serial, nombre_pc_red, proveedor, enviar_dian, enviar_cliente, nit, razon_social, head_note, tomar_municipio_tns, validar_codcliente_tns, desactivar_xml_enlista, validar_correo_enlinea, url_validar_licencia, url_bouncer, apikey_bouncer, tiempo_bouncer, enviar_datos_establecimiento $compl_insert) VALUES (" . $NM_seq_auto . "'$this->ccnit', '$this->nombre_razonsocial', '$this->celular', '$this->correo', '$this->codsucursal', $this->cantidaddecimales, '$this->valortributounidad', '$this->observaciones', '$this->conf_auto_tercero', '$this->no_validar_mail', '$this->email_alternativo', '$this->servidor1', '$this->servidor2', '$this->servidor3', '$this->tokenempresa', '$this->tokenpassword', '$this->servidor1_pruebas', '$this->servidor2_pruebas', '$this->servidor3_pruebas', '$this->token_pruebas', '$this->password_pruebas', '$this->modo', '$this->smtp_servidor', '$this->smtp_usuario', '$this->smtp_password', $this->smtp_puerto, '$this->smtp_tipo', '$this->asunto', '$this->mensaje', '$this->correo_para_prueba', '$this->logo', '$this->enviar_documento_online', '$this->contacto_nombre', '$this->contacto_cargo', '$this->contacto_correo', '$this->contacto_celular', '$this->contacto_fijo', '$this->servidor_facturas', '$this->correo_copia', '$this->direccion', '$this->ciudad', '$this->pagina_web', '$this->actividad_principal', '$this->regimen', '$this->desviar_correo_a', '$this->pie_pagina', '$this->mensaje_nc', '$this->pie_pagina_nc', '$this->servidor_nc', '$this->informacion_adicional', '$this->sumarimpuestosdeldetalle', '$this->serial', '$this->nombre_pc_red', '$this->proveedor', $this->enviar_dian, $this->enviar_cliente, '$this->nit', '$this->razon_social', '$this->head_note', '$this->tomar_municipio_tns', '$this->validar_codcliente_tns', '$this->desactivar_xml_enlista', '$this->validar_correo_enlinea', '$this->url_validar_licencia', '$this->url_bouncer', '$this->apikey_bouncer', $this->tiempo_bouncer, '$this->enviar_datos_establecimiento' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ccnit, nombre_razonsocial, celular, correo, codsucursal, cantidadDecimales, valorTributoUnidad, observaciones, conf_auto_tercero, no_validar_mail, email_alternativo, servidor1, servidor2, servidor3, tokenempresa, tokenpassword, servidor1_pruebas, servidor2_pruebas, servidor3_pruebas, token_pruebas, password_pruebas, modo, smtp_servidor, smtp_usuario, smtp_password, smtp_puerto, smtp_tipo, asunto, mensaje, correo_para_prueba, logo, enviar_documento_online, contacto_nombre, contacto_cargo, contacto_correo, contacto_celular, contacto_fijo, servidor_facturas, correo_copia, direccion, ciudad, pagina_web, actividad_principal, regimen, desviar_correo_a, pie_pagina, mensaje_nc, pie_pagina_nc, servidor_nc, informacion_adicional, sumarImpuestosDelDetalle, serial, nombre_pc_red, proveedor, enviar_dian, enviar_cliente, nit, razon_social, head_note, tomar_municipio_tns, validar_codcliente_tns, desactivar_xml_enlista, validar_correo_enlinea, url_validar_licencia, url_bouncer, apikey_bouncer, tiempo_bouncer, enviar_datos_establecimiento $compl_insert) VALUES (" . $NM_seq_auto . "'$this->ccnit', '$this->nombre_razonsocial', '$this->celular', '$this->correo', '$this->codsucursal', $this->cantidaddecimales, '$this->valortributounidad', '$this->observaciones', '$this->conf_auto_tercero', '$this->no_validar_mail', '$this->email_alternativo', '$this->servidor1', '$this->servidor2', '$this->servidor3', '$this->tokenempresa', '$this->tokenpassword', '$this->servidor1_pruebas', '$this->servidor2_pruebas', '$this->servidor3_pruebas', '$this->token_pruebas', '$this->password_pruebas', '$this->modo', '$this->smtp_servidor', '$this->smtp_usuario', '$this->smtp_password', $this->smtp_puerto, '$this->smtp_tipo', '$this->asunto', '$this->mensaje', '$this->correo_para_prueba', '$this->logo', '$this->enviar_documento_online', '$this->contacto_nombre', '$this->contacto_cargo', '$this->contacto_correo', '$this->contacto_celular', '$this->contacto_fijo', '$this->servidor_facturas', '$this->correo_copia', '$this->direccion', '$this->ciudad', '$this->pagina_web', '$this->actividad_principal', '$this->regimen', '$this->desviar_correo_a', '$this->pie_pagina', '$this->mensaje_nc', '$this->pie_pagina_nc', '$this->servidor_nc', '$this->informacion_adicional', '$this->sumarimpuestosdeldetalle', '$this->serial', '$this->nombre_pc_red', '$this->proveedor', $this->enviar_dian, $this->enviar_cliente, '$this->nit', '$this->razon_social', '$this->head_note', '$this->tomar_municipio_tns', '$this->validar_codcliente_tns', '$this->desactivar_xml_enlista', '$this->validar_correo_enlinea', '$this->url_validar_licencia', '$this->url_bouncer', '$this->apikey_bouncer', $this->tiempo_bouncer, '$this->enviar_datos_establecimiento' $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ccnit, nombre_razonsocial, celular, correo, codsucursal, cantidadDecimales, valorTributoUnidad, observaciones, conf_auto_tercero, no_validar_mail, email_alternativo, servidor1, servidor2, servidor3, tokenempresa, tokenpassword, servidor1_pruebas, servidor2_pruebas, servidor3_pruebas, token_pruebas, password_pruebas, modo, smtp_servidor, smtp_usuario, smtp_password, smtp_puerto, smtp_tipo, asunto, mensaje, correo_para_prueba, logo, enviar_documento_online, contacto_nombre, contacto_cargo, contacto_correo, contacto_celular, contacto_fijo, servidor_facturas, correo_copia, direccion, ciudad, pagina_web, actividad_principal, regimen, desviar_correo_a, pie_pagina, mensaje_nc, pie_pagina_nc, servidor_nc, informacion_adicional, sumarImpuestosDelDetalle, serial, nombre_pc_red, proveedor, enviar_dian, enviar_cliente, nit, razon_social, head_note, tomar_municipio_tns, validar_codcliente_tns, desactivar_xml_enlista, validar_correo_enlinea, url_validar_licencia, url_bouncer, apikey_bouncer, tiempo_bouncer, enviar_datos_establecimiento $compl_insert) VALUES (" . $NM_seq_auto . "'$this->ccnit', '$this->nombre_razonsocial', '$this->celular', '$this->correo', '$this->codsucursal', $this->cantidaddecimales, '$this->valortributounidad', '$this->observaciones', '$this->conf_auto_tercero', '$this->no_validar_mail', '$this->email_alternativo', '$this->servidor1', '$this->servidor2', '$this->servidor3', '$this->tokenempresa', '$this->tokenpassword', '$this->servidor1_pruebas', '$this->servidor2_pruebas', '$this->servidor3_pruebas', '$this->token_pruebas', '$this->password_pruebas', '$this->modo', '$this->smtp_servidor', '$this->smtp_usuario', '$this->smtp_password', $this->smtp_puerto, '$this->smtp_tipo', '$this->asunto', '$this->mensaje', '$this->correo_para_prueba', '$this->logo', '$this->enviar_documento_online', '$this->contacto_nombre', '$this->contacto_cargo', '$this->contacto_correo', '$this->contacto_celular', '$this->contacto_fijo', '$this->servidor_facturas', '$this->correo_copia', '$this->direccion', '$this->ciudad', '$this->pagina_web', '$this->actividad_principal', '$this->regimen', '$this->desviar_correo_a', '$this->pie_pagina', '$this->mensaje_nc', '$this->pie_pagina_nc', '$this->servidor_nc', '$this->informacion_adicional', '$this->sumarimpuestosdeldetalle', '$this->serial', '$this->nombre_pc_red', '$this->proveedor', $this->enviar_dian, $this->enviar_cliente, '$this->nit', '$this->razon_social', '$this->head_note', '$this->tomar_municipio_tns', '$this->validar_codcliente_tns', '$this->desactivar_xml_enlista', '$this->validar_correo_enlinea', '$this->url_validar_licencia', '$this->url_bouncer', '$this->apikey_bouncer', $this->tiempo_bouncer, '$this->enviar_datos_establecimiento' $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->activo != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo'";
                  } 
                  if ($this->creado != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado'";
                  } 
                  if ($this->editado != "")
                  { 
                       $compl_insert     .= ", editado";
                       $compl_insert_val .= ", '$this->editado'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ccnit, nombre_razonsocial, celular, correo, codsucursal, cantidadDecimales, valorTributoUnidad, observaciones, conf_auto_tercero, no_validar_mail, email_alternativo, servidor1, servidor2, servidor3, tokenempresa, tokenpassword, servidor1_pruebas, servidor2_pruebas, servidor3_pruebas, token_pruebas, password_pruebas, modo, smtp_servidor, smtp_usuario, smtp_password, smtp_puerto, smtp_tipo, asunto, mensaje, correo_para_prueba, logo, enviar_documento_online, contacto_nombre, contacto_cargo, contacto_correo, contacto_celular, contacto_fijo, servidor_facturas, correo_copia, direccion, ciudad, pagina_web, actividad_principal, regimen, desviar_correo_a, pie_pagina, mensaje_nc, pie_pagina_nc, servidor_nc, informacion_adicional, sumarImpuestosDelDetalle, serial, nombre_pc_red, proveedor, enviar_dian, enviar_cliente, nit, razon_social, head_note, tomar_municipio_tns, validar_codcliente_tns, desactivar_xml_enlista, validar_correo_enlinea, url_validar_licencia, url_bouncer, apikey_bouncer, tiempo_bouncer, enviar_datos_establecimiento $compl_insert) VALUES (" . $NM_seq_auto . "'$this->ccnit', '$this->nombre_razonsocial', '$this->celular', '$this->correo', '$this->codsucursal', $this->cantidaddecimales, '$this->valortributounidad', '$this->observaciones', '$this->conf_auto_tercero', '$this->no_validar_mail', '$this->email_alternativo', '$this->servidor1', '$this->servidor2', '$this->servidor3', '$this->tokenempresa', '$this->tokenpassword', '$this->servidor1_pruebas', '$this->servidor2_pruebas', '$this->servidor3_pruebas', '$this->token_pruebas', '$this->password_pruebas', '$this->modo', '$this->smtp_servidor', '$this->smtp_usuario', '$this->smtp_password', $this->smtp_puerto, '$this->smtp_tipo', '$this->asunto', '$this->mensaje', '$this->correo_para_prueba', '$this->logo', '$this->enviar_documento_online', '$this->contacto_nombre', '$this->contacto_cargo', '$this->contacto_correo', '$this->contacto_celular', '$this->contacto_fijo', '$this->servidor_facturas', '$this->correo_copia', '$this->direccion', '$this->ciudad', '$this->pagina_web', '$this->actividad_principal', '$this->regimen', '$this->desviar_correo_a', '$this->pie_pagina', '$this->mensaje_nc', '$this->pie_pagina_nc', '$this->servidor_nc', '$this->informacion_adicional', '$this->sumarimpuestosdeldetalle', '$this->serial', '$this->nombre_pc_red', '$this->proveedor', $this->enviar_dian, $this->enviar_cliente, '$this->nit', '$this->razon_social', '$this->head_note', '$this->tomar_municipio_tns', '$this->validar_codcliente_tns', '$this->desactivar_xml_enlista', '$this->validar_correo_enlinea', '$this->url_validar_licencia', '$this->url_bouncer', '$this->apikey_bouncer', $this->tiempo_bouncer, '$this->enviar_datos_establecimiento' $compl_insert_val)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
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
                              form_cloud_empresas_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_cloud_empresas_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_empresa =  $rsy->fields[0];
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
                  $this->id_empresa = $rsy->fields[0];
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
                  $this->id_empresa = $rsy->fields[0];
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
                  $this->id_empresa = $rsy->fields[0];
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
                  $this->id_empresa = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->ccnit = $this->ccnit_before_qstr;
              $this->nombre_razonsocial = $this->nombre_razonsocial_before_qstr;
              $this->celular = $this->celular_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->codsucursal = $this->codsucursal_before_qstr;
              $this->valortributounidad = $this->valortributounidad_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->email_alternativo = $this->email_alternativo_before_qstr;
              $this->servidor1 = $this->servidor1_before_qstr;
              $this->servidor2 = $this->servidor2_before_qstr;
              $this->servidor3 = $this->servidor3_before_qstr;
              $this->tokenempresa = $this->tokenempresa_before_qstr;
              $this->tokenpassword = $this->tokenpassword_before_qstr;
              $this->servidor1_pruebas = $this->servidor1_pruebas_before_qstr;
              $this->servidor2_pruebas = $this->servidor2_pruebas_before_qstr;
              $this->servidor3_pruebas = $this->servidor3_pruebas_before_qstr;
              $this->token_pruebas = $this->token_pruebas_before_qstr;
              $this->password_pruebas = $this->password_pruebas_before_qstr;
              $this->modo = $this->modo_before_qstr;
              $this->smtp_servidor = $this->smtp_servidor_before_qstr;
              $this->smtp_usuario = $this->smtp_usuario_before_qstr;
              $this->smtp_password = $this->smtp_password_before_qstr;
              $this->smtp_tipo = $this->smtp_tipo_before_qstr;
              $this->asunto = $this->asunto_before_qstr;
              $this->mensaje = $this->mensaje_before_qstr;
              $this->correo_para_prueba = $this->correo_para_prueba_before_qstr;
              $this->logo = $this->logo_before_qstr;
              $this->contacto_nombre = $this->contacto_nombre_before_qstr;
              $this->contacto_cargo = $this->contacto_cargo_before_qstr;
              $this->contacto_correo = $this->contacto_correo_before_qstr;
              $this->contacto_celular = $this->contacto_celular_before_qstr;
              $this->contacto_fijo = $this->contacto_fijo_before_qstr;
              $this->servidor_facturas = $this->servidor_facturas_before_qstr;
              $this->correo_copia = $this->correo_copia_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->ciudad = $this->ciudad_before_qstr;
              $this->pagina_web = $this->pagina_web_before_qstr;
              $this->actividad_principal = $this->actividad_principal_before_qstr;
              $this->regimen = $this->regimen_before_qstr;
              $this->desviar_correo_a = $this->desviar_correo_a_before_qstr;
              $this->pie_pagina = $this->pie_pagina_before_qstr;
              $this->mensaje_nc = $this->mensaje_nc_before_qstr;
              $this->pie_pagina_nc = $this->pie_pagina_nc_before_qstr;
              $this->servidor_nc = $this->servidor_nc_before_qstr;
              $this->informacion_adicional = $this->informacion_adicional_before_qstr;
              $this->serial = $this->serial_before_qstr;
              $this->nombre_pc_red = $this->nombre_pc_red_before_qstr;
              $this->proveedor = $this->proveedor_before_qstr;
              $this->nit = $this->nit_before_qstr;
              $this->razon_social = $this->razon_social_before_qstr;
              $this->head_note = $this->head_note_before_qstr;
              $this->url_validar_licencia = $this->url_validar_licencia_before_qstr;
              $this->url_bouncer = $this->url_bouncer_before_qstr;
              $this->apikey_bouncer = $this->apikey_bouncer_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total']);
              }

              $dir_img = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . "/"; 
              if (nm_mkdir($dir_img))  
              { 
                  $arq_logo = fopen($this->SC_IMG_logo, "r") ; 
                  $reg_logo = fread($arq_logo, filesize($this->SC_IMG_logo)) ; 
                  fclose($arq_logo) ;  
                  $arq_logo = fopen($dir_img . trim($this->logo_scfile_name), "w") ; 
                  fwrite($arq_logo, $reg_logo) ;  
                  fclose($arq_logo) ;  
              } 
              $this->sc_evento = "insert"; 
              $this->ccnit = $this->ccnit_before_qstr;
              $this->nombre_razonsocial = $this->nombre_razonsocial_before_qstr;
              $this->celular = $this->celular_before_qstr;
              $this->correo = $this->correo_before_qstr;
              $this->codsucursal = $this->codsucursal_before_qstr;
              $this->valortributounidad = $this->valortributounidad_before_qstr;
              $this->observaciones = $this->observaciones_before_qstr;
              $this->email_alternativo = $this->email_alternativo_before_qstr;
              $this->servidor1 = $this->servidor1_before_qstr;
              $this->servidor2 = $this->servidor2_before_qstr;
              $this->servidor3 = $this->servidor3_before_qstr;
              $this->tokenempresa = $this->tokenempresa_before_qstr;
              $this->tokenpassword = $this->tokenpassword_before_qstr;
              $this->servidor1_pruebas = $this->servidor1_pruebas_before_qstr;
              $this->servidor2_pruebas = $this->servidor2_pruebas_before_qstr;
              $this->servidor3_pruebas = $this->servidor3_pruebas_before_qstr;
              $this->token_pruebas = $this->token_pruebas_before_qstr;
              $this->password_pruebas = $this->password_pruebas_before_qstr;
              $this->modo = $this->modo_before_qstr;
              $this->smtp_servidor = $this->smtp_servidor_before_qstr;
              $this->smtp_usuario = $this->smtp_usuario_before_qstr;
              $this->smtp_password = $this->smtp_password_before_qstr;
              $this->smtp_tipo = $this->smtp_tipo_before_qstr;
              $this->asunto = $this->asunto_before_qstr;
              $this->mensaje = $this->mensaje_before_qstr;
              $this->correo_para_prueba = $this->correo_para_prueba_before_qstr;
              $this->logo = $this->logo_before_qstr;
              $this->contacto_nombre = $this->contacto_nombre_before_qstr;
              $this->contacto_cargo = $this->contacto_cargo_before_qstr;
              $this->contacto_correo = $this->contacto_correo_before_qstr;
              $this->contacto_celular = $this->contacto_celular_before_qstr;
              $this->contacto_fijo = $this->contacto_fijo_before_qstr;
              $this->servidor_facturas = $this->servidor_facturas_before_qstr;
              $this->correo_copia = $this->correo_copia_before_qstr;
              $this->direccion = $this->direccion_before_qstr;
              $this->ciudad = $this->ciudad_before_qstr;
              $this->pagina_web = $this->pagina_web_before_qstr;
              $this->actividad_principal = $this->actividad_principal_before_qstr;
              $this->regimen = $this->regimen_before_qstr;
              $this->desviar_correo_a = $this->desviar_correo_a_before_qstr;
              $this->pie_pagina = $this->pie_pagina_before_qstr;
              $this->mensaje_nc = $this->mensaje_nc_before_qstr;
              $this->pie_pagina_nc = $this->pie_pagina_nc_before_qstr;
              $this->servidor_nc = $this->servidor_nc_before_qstr;
              $this->informacion_adicional = $this->informacion_adicional_before_qstr;
              $this->serial = $this->serial_before_qstr;
              $this->nombre_pc_red = $this->nombre_pc_red_before_qstr;
              $this->proveedor = $this->proveedor_before_qstr;
              $this->nit = $this->nit_before_qstr;
              $this->razon_social = $this->razon_social_before_qstr;
              $this->head_note = $this->head_note_before_qstr;
              $this->url_validar_licencia = $this->url_validar_licencia_before_qstr;
              $this->url_bouncer = $this->url_bouncer_before_qstr;
              $this->apikey_bouncer = $this->apikey_bouncer_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_empresa = substr($this->Db->qstr($this->id_empresa), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "); 
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
          $aEraseFiles = array();
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id_empresa = $this->id_empresa "); 
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
                          form_cloud_empresas_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . "/"; 
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['logo']);
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total']);
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
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['parms'] = "id_empresa?#?$this->id_empresa?@?"; 
      }
      $this->nmgp_dados_form['logo'] = ""; 
      $this->logo_limpa = ""; 
      $this->logo_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_empresa = null === $this->id_empresa ? null : substr($this->Db->qstr($this->id_empresa), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id_empresa, ccnit, nombre_razonsocial, celular, correo, activo, creado, editado, codsucursal, cantidadDecimales, valorTributoUnidad, observaciones, conf_auto_tercero, no_validar_mail, email_alternativo, servidor1, servidor2, servidor3, tokenempresa, tokenpassword, servidor1_pruebas, servidor2_pruebas, servidor3_pruebas, token_pruebas, password_pruebas, modo, smtp_servidor, smtp_usuario, smtp_password, smtp_puerto, smtp_tipo, asunto, mensaje, correo_para_prueba, logo, enviar_documento_online, contacto_nombre, contacto_cargo, contacto_correo, contacto_celular, contacto_fijo, servidor_facturas, correo_copia, direccion, ciudad, pagina_web, actividad_principal, regimen, desviar_correo_a, pie_pagina, mensaje_nc, pie_pagina_nc, servidor_nc, informacion_adicional, sumarImpuestosDelDetalle, serial, nombre_pc_red, proveedor, enviar_dian, enviar_cliente, nit, razon_social, head_note, tomar_municipio_tns, validar_codcliente_tns, desactivar_xml_enlista, validar_correo_enlinea, url_validar_licencia, url_bouncer, apikey_bouncer, tiempo_bouncer, enviar_datos_establecimiento from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id_empresa, ccnit, nombre_razonsocial, celular, correo, activo, creado, editado, codsucursal, cantidadDecimales, valorTributoUnidad, observaciones, conf_auto_tercero, no_validar_mail, email_alternativo, servidor1, servidor2, servidor3, tokenempresa, tokenpassword, servidor1_pruebas, servidor2_pruebas, servidor3_pruebas, token_pruebas, password_pruebas, modo, smtp_servidor, smtp_usuario, smtp_password, smtp_puerto, smtp_tipo, asunto, mensaje, correo_para_prueba, logo, enviar_documento_online, contacto_nombre, contacto_cargo, contacto_correo, contacto_celular, contacto_fijo, servidor_facturas, correo_copia, direccion, ciudad, pagina_web, actividad_principal, regimen, desviar_correo_a, pie_pagina, mensaje_nc, pie_pagina_nc, servidor_nc, informacion_adicional, sumarImpuestosDelDetalle, serial, nombre_pc_red, proveedor, enviar_dian, enviar_cliente, nit, razon_social, head_note, tomar_municipio_tns, validar_codcliente_tns, desactivar_xml_enlista, validar_correo_enlinea, url_validar_licencia, url_bouncer, apikey_bouncer, tiempo_bouncer, enviar_datos_establecimiento from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "id_empresa = $this->id_empresa"; 
              }  
              else  
              {
                  $aWhere[] = "id_empresa = $this->id_empresa"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "id_empresa";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter'] = true;
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
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id_empresa = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_empresa'] = $this->id_empresa;
              $this->ccnit = $rs->fields[1] ; 
              $this->nmgp_dados_select['ccnit'] = $this->ccnit;
              $this->nombre_razonsocial = $rs->fields[2] ; 
              $this->nmgp_dados_select['nombre_razonsocial'] = $this->nombre_razonsocial;
              $this->celular = $rs->fields[3] ; 
              $this->nmgp_dados_select['celular'] = $this->celular;
              $this->correo = $rs->fields[4] ; 
              $this->nmgp_dados_select['correo'] = $this->correo;
              $this->activo = $rs->fields[5] ; 
              $this->nmgp_dados_select['activo'] = $this->activo;
              $this->creado = $rs->fields[6] ; 
              if (substr($this->creado, 10, 1) == "-") 
              { 
                 $this->creado = substr($this->creado, 0, 10) . " " . substr($this->creado, 11);
              } 
              if (substr($this->creado, 13, 1) == ".") 
              { 
                 $this->creado = substr($this->creado, 0, 13) . ":" . substr($this->creado, 14, 2) . ":" . substr($this->creado, 17);
              } 
              $this->nmgp_dados_select['creado'] = $this->creado;
              $this->editado = $rs->fields[7] ; 
              if (substr($this->editado, 10, 1) == "-") 
              { 
                 $this->editado = substr($this->editado, 0, 10) . " " . substr($this->editado, 11);
              } 
              if (substr($this->editado, 13, 1) == ".") 
              { 
                 $this->editado = substr($this->editado, 0, 13) . ":" . substr($this->editado, 14, 2) . ":" . substr($this->editado, 17);
              } 
              $this->nmgp_dados_select['editado'] = $this->editado;
              $this->codsucursal = $rs->fields[8] ; 
              $this->nmgp_dados_select['codsucursal'] = $this->codsucursal;
              $this->cantidaddecimales = $rs->fields[9] ; 
              $this->nmgp_dados_select['cantidaddecimales'] = $this->cantidaddecimales;
              $this->valortributounidad = $rs->fields[10] ; 
              $this->nmgp_dados_select['valortributounidad'] = $this->valortributounidad;
              $this->observaciones = $rs->fields[11] ; 
              $this->nmgp_dados_select['observaciones'] = $this->observaciones;
              $this->conf_auto_tercero = $rs->fields[12] ; 
              $this->nmgp_dados_select['conf_auto_tercero'] = $this->conf_auto_tercero;
              $this->no_validar_mail = $rs->fields[13] ; 
              $this->nmgp_dados_select['no_validar_mail'] = $this->no_validar_mail;
              $this->email_alternativo = $rs->fields[14] ; 
              $this->nmgp_dados_select['email_alternativo'] = $this->email_alternativo;
              $this->servidor1 = $rs->fields[15] ; 
              $this->nmgp_dados_select['servidor1'] = $this->servidor1;
              $this->servidor2 = $rs->fields[16] ; 
              $this->nmgp_dados_select['servidor2'] = $this->servidor2;
              $this->servidor3 = $rs->fields[17] ; 
              $this->nmgp_dados_select['servidor3'] = $this->servidor3;
              $this->tokenempresa = $rs->fields[18] ; 
              $this->nmgp_dados_select['tokenempresa'] = $this->tokenempresa;
              $this->tokenpassword = $rs->fields[19] ; 
              $this->nmgp_dados_select['tokenpassword'] = $this->tokenpassword;
              $this->servidor1_pruebas = $rs->fields[20] ; 
              $this->nmgp_dados_select['servidor1_pruebas'] = $this->servidor1_pruebas;
              $this->servidor2_pruebas = $rs->fields[21] ; 
              $this->nmgp_dados_select['servidor2_pruebas'] = $this->servidor2_pruebas;
              $this->servidor3_pruebas = $rs->fields[22] ; 
              $this->nmgp_dados_select['servidor3_pruebas'] = $this->servidor3_pruebas;
              $this->token_pruebas = $rs->fields[23] ; 
              $this->nmgp_dados_select['token_pruebas'] = $this->token_pruebas;
              $this->password_pruebas = $rs->fields[24] ; 
              $this->nmgp_dados_select['password_pruebas'] = $this->password_pruebas;
              $this->modo = $rs->fields[25] ; 
              $this->nmgp_dados_select['modo'] = $this->modo;
              $this->smtp_servidor = $rs->fields[26] ; 
              $this->nmgp_dados_select['smtp_servidor'] = $this->smtp_servidor;
              $this->smtp_usuario = $rs->fields[27] ; 
              $this->nmgp_dados_select['smtp_usuario'] = $this->smtp_usuario;
              $this->smtp_password = $rs->fields[28] ; 
              $this->nmgp_dados_select['smtp_password'] = $this->smtp_password;
              $this->smtp_puerto = $rs->fields[29] ; 
              $this->nmgp_dados_select['smtp_puerto'] = $this->smtp_puerto;
              $this->smtp_tipo = $rs->fields[30] ; 
              $this->nmgp_dados_select['smtp_tipo'] = $this->smtp_tipo;
              $this->asunto = $rs->fields[31] ; 
              $this->nmgp_dados_select['asunto'] = $this->asunto;
              $this->mensaje = $rs->fields[32] ; 
              $this->nmgp_dados_select['mensaje'] = $this->mensaje;
              $this->correo_para_prueba = $rs->fields[33] ; 
              $this->nmgp_dados_select['correo_para_prueba'] = $this->correo_para_prueba;
              $this->logo = $rs->fields[34] ; 
              $this->nmgp_dados_select['logo'] = $this->logo;
              $this->enviar_documento_online = $rs->fields[35] ; 
              $this->nmgp_dados_select['enviar_documento_online'] = $this->enviar_documento_online;
              $this->contacto_nombre = $rs->fields[36] ; 
              $this->nmgp_dados_select['contacto_nombre'] = $this->contacto_nombre;
              $this->contacto_cargo = $rs->fields[37] ; 
              $this->nmgp_dados_select['contacto_cargo'] = $this->contacto_cargo;
              $this->contacto_correo = $rs->fields[38] ; 
              $this->nmgp_dados_select['contacto_correo'] = $this->contacto_correo;
              $this->contacto_celular = $rs->fields[39] ; 
              $this->nmgp_dados_select['contacto_celular'] = $this->contacto_celular;
              $this->contacto_fijo = $rs->fields[40] ; 
              $this->nmgp_dados_select['contacto_fijo'] = $this->contacto_fijo;
              $this->servidor_facturas = $rs->fields[41] ; 
              $this->nmgp_dados_select['servidor_facturas'] = $this->servidor_facturas;
              $this->correo_copia = $rs->fields[42] ; 
              $this->nmgp_dados_select['correo_copia'] = $this->correo_copia;
              $this->direccion = $rs->fields[43] ; 
              $this->nmgp_dados_select['direccion'] = $this->direccion;
              $this->ciudad = $rs->fields[44] ; 
              $this->nmgp_dados_select['ciudad'] = $this->ciudad;
              $this->pagina_web = $rs->fields[45] ; 
              $this->nmgp_dados_select['pagina_web'] = $this->pagina_web;
              $this->actividad_principal = $rs->fields[46] ; 
              $this->nmgp_dados_select['actividad_principal'] = $this->actividad_principal;
              $this->regimen = $rs->fields[47] ; 
              $this->nmgp_dados_select['regimen'] = $this->regimen;
              $this->desviar_correo_a = $rs->fields[48] ; 
              $this->nmgp_dados_select['desviar_correo_a'] = $this->desviar_correo_a;
              $this->pie_pagina = $rs->fields[49] ; 
              $this->nmgp_dados_select['pie_pagina'] = $this->pie_pagina;
              $this->mensaje_nc = $rs->fields[50] ; 
              $this->nmgp_dados_select['mensaje_nc'] = $this->mensaje_nc;
              $this->pie_pagina_nc = $rs->fields[51] ; 
              $this->nmgp_dados_select['pie_pagina_nc'] = $this->pie_pagina_nc;
              $this->servidor_nc = $rs->fields[52] ; 
              $this->nmgp_dados_select['servidor_nc'] = $this->servidor_nc;
              $this->informacion_adicional = $rs->fields[53] ; 
              $this->nmgp_dados_select['informacion_adicional'] = $this->informacion_adicional;
              $this->sumarimpuestosdeldetalle = $rs->fields[54] ; 
              $this->nmgp_dados_select['sumarimpuestosdeldetalle'] = $this->sumarimpuestosdeldetalle;
              $this->serial = $rs->fields[55] ; 
              $this->nmgp_dados_select['serial'] = $this->serial;
              $this->nombre_pc_red = $rs->fields[56] ; 
              $this->nmgp_dados_select['nombre_pc_red'] = $this->nombre_pc_red;
              $this->proveedor = $rs->fields[57] ; 
              $this->nmgp_dados_select['proveedor'] = $this->proveedor;
              $this->enviar_dian = $rs->fields[58] ; 
              $this->nmgp_dados_select['enviar_dian'] = $this->enviar_dian;
              $this->enviar_cliente = $rs->fields[59] ; 
              $this->nmgp_dados_select['enviar_cliente'] = $this->enviar_cliente;
              $this->nit = $rs->fields[60] ; 
              $this->nmgp_dados_select['nit'] = $this->nit;
              $this->razon_social = $rs->fields[61] ; 
              $this->nmgp_dados_select['razon_social'] = $this->razon_social;
              $this->head_note = $rs->fields[62] ; 
              $this->nmgp_dados_select['head_note'] = $this->head_note;
              $this->tomar_municipio_tns = $rs->fields[63] ; 
              $this->nmgp_dados_select['tomar_municipio_tns'] = $this->tomar_municipio_tns;
              $this->validar_codcliente_tns = $rs->fields[64] ; 
              $this->nmgp_dados_select['validar_codcliente_tns'] = $this->validar_codcliente_tns;
              $this->desactivar_xml_enlista = $rs->fields[65] ; 
              $this->nmgp_dados_select['desactivar_xml_enlista'] = $this->desactivar_xml_enlista;
              $this->validar_correo_enlinea = $rs->fields[66] ; 
              $this->nmgp_dados_select['validar_correo_enlinea'] = $this->validar_correo_enlinea;
              $this->url_validar_licencia = $rs->fields[67] ; 
              $this->nmgp_dados_select['url_validar_licencia'] = $this->url_validar_licencia;
              $this->url_bouncer = $rs->fields[68] ; 
              $this->nmgp_dados_select['url_bouncer'] = $this->url_bouncer;
              $this->apikey_bouncer = $rs->fields[69] ; 
              $this->nmgp_dados_select['apikey_bouncer'] = $this->apikey_bouncer;
              $this->tiempo_bouncer = $rs->fields[70] ; 
              $this->nmgp_dados_select['tiempo_bouncer'] = $this->tiempo_bouncer;
              $this->enviar_datos_establecimiento = $rs->fields[71] ; 
              $this->nmgp_dados_select['enviar_datos_establecimiento'] = $this->enviar_datos_establecimiento;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_empresa = (string)$this->id_empresa; 
              $this->cantidaddecimales = (string)$this->cantidaddecimales; 
              $this->smtp_puerto = (string)$this->smtp_puerto; 
              $this->enviar_dian = (string)$this->enviar_dian; 
              $this->enviar_cliente = (string)$this->enviar_cliente; 
              $this->tiempo_bouncer = (string)$this->tiempo_bouncer; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['parms'] = "id_empresa?#?$this->id_empresa?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['sub_dir'][0]  = "/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['reg_start'] < $qt_geral_reg_form_cloud_empresas_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opcao']   = '';
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
              $this->id_empresa = "";  
              $this->nmgp_dados_form["id_empresa"] = $this->id_empresa;
              $this->ccnit = "";  
              $this->nmgp_dados_form["ccnit"] = $this->ccnit;
              $this->nombre_razonsocial = "";  
              $this->nmgp_dados_form["nombre_razonsocial"] = $this->nombre_razonsocial;
              $this->celular = "";  
              $this->nmgp_dados_form["celular"] = $this->celular;
              $this->correo = "";  
              $this->nmgp_dados_form["correo"] = $this->correo;
              $this->activo = "";  
              $this->nmgp_dados_form["activo"] = $this->activo;
              $this->creado = "";  
              $this->creado_hora = "" ;  
              $this->nmgp_dados_form["creado"] = $this->creado;
              $this->editado = "";  
              $this->editado_hora = "" ;  
              $this->nmgp_dados_form["editado"] = $this->editado;
              $this->codsucursal = "";  
              $this->nmgp_dados_form["codsucursal"] = $this->codsucursal;
              $this->cantidaddecimales = "2";  
              $this->nmgp_dados_form["cantidaddecimales"] = $this->cantidaddecimales;
              $this->valortributounidad = "0.00";  
              $this->nmgp_dados_form["valortributounidad"] = $this->valortributounidad;
              $this->observaciones = "";  
              $this->nmgp_dados_form["observaciones"] = $this->observaciones;
              $this->conf_auto_tercero = "NO";  
              $this->nmgp_dados_form["conf_auto_tercero"] = $this->conf_auto_tercero;
              $this->no_validar_mail = "NO";  
              $this->nmgp_dados_form["no_validar_mail"] = $this->no_validar_mail;
              $this->email_alternativo = "";  
              $this->nmgp_dados_form["email_alternativo"] = $this->email_alternativo;
              $this->servidor1 = "";  
              $this->nmgp_dados_form["servidor1"] = $this->servidor1;
              $this->servidor2 = "";  
              $this->nmgp_dados_form["servidor2"] = $this->servidor2;
              $this->servidor3 = "";  
              $this->nmgp_dados_form["servidor3"] = $this->servidor3;
              $this->tokenempresa = "";  
              $this->nmgp_dados_form["tokenempresa"] = $this->tokenempresa;
              $this->tokenpassword = "";  
              $this->nmgp_dados_form["tokenpassword"] = $this->tokenpassword;
              $this->servidor1_pruebas = "";  
              $this->nmgp_dados_form["servidor1_pruebas"] = $this->servidor1_pruebas;
              $this->servidor2_pruebas = "";  
              $this->nmgp_dados_form["servidor2_pruebas"] = $this->servidor2_pruebas;
              $this->servidor3_pruebas = "";  
              $this->nmgp_dados_form["servidor3_pruebas"] = $this->servidor3_pruebas;
              $this->token_pruebas = "";  
              $this->nmgp_dados_form["token_pruebas"] = $this->token_pruebas;
              $this->password_pruebas = "";  
              $this->nmgp_dados_form["password_pruebas"] = $this->password_pruebas;
              $this->modo = "DESARROLLO";  
              $this->nmgp_dados_form["modo"] = $this->modo;
              $this->smtp_servidor = "";  
              $this->nmgp_dados_form["smtp_servidor"] = $this->smtp_servidor;
              $this->smtp_usuario = "";  
              $this->nmgp_dados_form["smtp_usuario"] = $this->smtp_usuario;
              $this->smtp_password = "";  
              $this->nmgp_dados_form["smtp_password"] = $this->smtp_password;
              $this->smtp_puerto = "25";  
              $this->nmgp_dados_form["smtp_puerto"] = $this->smtp_puerto;
              $this->smtp_tipo = "NO";  
              $this->nmgp_dados_form["smtp_tipo"] = $this->smtp_tipo;
              $this->asunto = "";  
              $this->nmgp_dados_form["asunto"] = $this->asunto;
              $this->mensaje = "";  
              $this->nmgp_dados_form["mensaje"] = $this->mensaje;
              $this->correo_para_prueba = "";  
              $this->nmgp_dados_form["correo_para_prueba"] = $this->correo_para_prueba;
              $this->logo = "";  
              $this->logo_ul_name = "" ;  
              $this->logo_ul_type = "" ;  
              $this->nmgp_dados_form["logo"] = $this->logo;
              $this->enviar_documento_online = "NO";  
              $this->nmgp_dados_form["enviar_documento_online"] = $this->enviar_documento_online;
              $this->contacto_nombre = "";  
              $this->nmgp_dados_form["contacto_nombre"] = $this->contacto_nombre;
              $this->contacto_cargo = "";  
              $this->nmgp_dados_form["contacto_cargo"] = $this->contacto_cargo;
              $this->contacto_correo = "";  
              $this->nmgp_dados_form["contacto_correo"] = $this->contacto_correo;
              $this->contacto_celular = "";  
              $this->nmgp_dados_form["contacto_celular"] = $this->contacto_celular;
              $this->contacto_fijo = "";  
              $this->nmgp_dados_form["contacto_fijo"] = $this->contacto_fijo;
              $this->servidor_facturas = "";  
              $this->nmgp_dados_form["servidor_facturas"] = $this->servidor_facturas;
              $this->correo_copia = "";  
              $this->nmgp_dados_form["correo_copia"] = $this->correo_copia;
              $this->direccion = "";  
              $this->nmgp_dados_form["direccion"] = $this->direccion;
              $this->ciudad = "";  
              $this->nmgp_dados_form["ciudad"] = $this->ciudad;
              $this->pagina_web = "";  
              $this->nmgp_dados_form["pagina_web"] = $this->pagina_web;
              $this->actividad_principal = "";  
              $this->nmgp_dados_form["actividad_principal"] = $this->actividad_principal;
              $this->regimen = "";  
              $this->nmgp_dados_form["regimen"] = $this->regimen;
              $this->desviar_correo_a = "";  
              $this->nmgp_dados_form["desviar_correo_a"] = $this->desviar_correo_a;
              $this->pie_pagina = "";  
              $this->nmgp_dados_form["pie_pagina"] = $this->pie_pagina;
              $this->mensaje_nc = "";  
              $this->nmgp_dados_form["mensaje_nc"] = $this->mensaje_nc;
              $this->pie_pagina_nc = "";  
              $this->nmgp_dados_form["pie_pagina_nc"] = $this->pie_pagina_nc;
              $this->servidor_nc = "";  
              $this->nmgp_dados_form["servidor_nc"] = $this->servidor_nc;
              $this->informacion_adicional = "";  
              $this->nmgp_dados_form["informacion_adicional"] = $this->informacion_adicional;
              $this->sumarimpuestosdeldetalle = "NO";  
              $this->nmgp_dados_form["sumarimpuestosdeldetalle"] = $this->sumarimpuestosdeldetalle;
              $this->serial = "";  
              $this->nmgp_dados_form["serial"] = $this->serial;
              $this->nombre_pc_red = "";  
              $this->nmgp_dados_form["nombre_pc_red"] = $this->nombre_pc_red;
              $this->proveedor = "FACILWEB";  
              $this->nmgp_dados_form["proveedor"] = $this->proveedor;
              $this->enviar_dian = "0";  
              $this->nmgp_dados_form["enviar_dian"] = $this->enviar_dian;
              $this->enviar_cliente = "0";  
              $this->nmgp_dados_form["enviar_cliente"] = $this->enviar_cliente;
              $this->nit = "";  
              $this->nmgp_dados_form["nit"] = $this->nit;
              $this->razon_social = "";  
              $this->nmgp_dados_form["razon_social"] = $this->razon_social;
              $this->head_note = "";  
              $this->nmgp_dados_form["head_note"] = $this->head_note;
              $this->tomar_municipio_tns = "NO";  
              $this->nmgp_dados_form["tomar_municipio_tns"] = $this->tomar_municipio_tns;
              $this->validar_codcliente_tns = "NO";  
              $this->nmgp_dados_form["validar_codcliente_tns"] = $this->validar_codcliente_tns;
              $this->desactivar_xml_enlista = "NO";  
              $this->nmgp_dados_form["desactivar_xml_enlista"] = $this->desactivar_xml_enlista;
              $this->validar_correo_enlinea = "NO";  
              $this->nmgp_dados_form["validar_correo_enlinea"] = $this->validar_correo_enlinea;
              $this->url_validar_licencia = "";  
              $this->nmgp_dados_form["url_validar_licencia"] = $this->url_validar_licencia;
              $this->url_bouncer = "";  
              $this->nmgp_dados_form["url_bouncer"] = $this->url_bouncer;
              $this->apikey_bouncer = "";  
              $this->nmgp_dados_form["apikey_bouncer"] = $this->apikey_bouncer;
              $this->tiempo_bouncer = "10";  
              $this->nmgp_dados_form["tiempo_bouncer"] = $this->tiempo_bouncer;
              $this->enviar_datos_establecimiento = "SI";  
              $this->nmgp_dados_form["enviar_datos_establecimiento"] = $this->enviar_datos_establecimiento;
              $this->correo_prueba = "";  
              $this->nmgp_dados_form["correo_prueba"] = $this->correo_prueba;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dados_select'];
                  $this->ccnit = $this->nmgp_dados_select['ccnit'];  
                  $this->nombre_razonsocial = $this->nmgp_dados_select['nombre_razonsocial'];  
                  $this->celular = $this->nmgp_dados_select['celular'];  
                  $this->correo = $this->nmgp_dados_select['correo'];  
                  $this->activo = $this->nmgp_dados_select['activo'];  
                  $this->creado = $this->nmgp_dados_select['creado'];  
                  $this->editado = $this->nmgp_dados_select['editado'];  
                  $this->codsucursal = $this->nmgp_dados_select['codsucursal'];  
                  $this->cantidaddecimales = $this->nmgp_dados_select['cantidaddecimales'];  
                  $this->valortributounidad = $this->nmgp_dados_select['valortributounidad'];  
                  $this->observaciones = $this->nmgp_dados_select['observaciones'];  
                  $this->conf_auto_tercero = $this->nmgp_dados_select['conf_auto_tercero'];  
                  $this->no_validar_mail = $this->nmgp_dados_select['no_validar_mail'];  
                  $this->email_alternativo = $this->nmgp_dados_select['email_alternativo'];  
                  $this->servidor1 = $this->nmgp_dados_select['servidor1'];  
                  $this->servidor2 = $this->nmgp_dados_select['servidor2'];  
                  $this->servidor3 = $this->nmgp_dados_select['servidor3'];  
                  $this->tokenempresa = $this->nmgp_dados_select['tokenempresa'];  
                  $this->tokenpassword = $this->nmgp_dados_select['tokenpassword'];  
                  $this->servidor1_pruebas = $this->nmgp_dados_select['servidor1_pruebas'];  
                  $this->servidor2_pruebas = $this->nmgp_dados_select['servidor2_pruebas'];  
                  $this->servidor3_pruebas = $this->nmgp_dados_select['servidor3_pruebas'];  
                  $this->token_pruebas = $this->nmgp_dados_select['token_pruebas'];  
                  $this->password_pruebas = $this->nmgp_dados_select['password_pruebas'];  
                  $this->modo = $this->nmgp_dados_select['modo'];  
                  $this->smtp_servidor = $this->nmgp_dados_select['smtp_servidor'];  
                  $this->smtp_usuario = $this->nmgp_dados_select['smtp_usuario'];  
                  $this->smtp_password = $this->nmgp_dados_select['smtp_password'];  
                  $this->smtp_puerto = $this->nmgp_dados_select['smtp_puerto'];  
                  $this->smtp_tipo = $this->nmgp_dados_select['smtp_tipo'];  
                  $this->asunto = $this->nmgp_dados_select['asunto'];  
                  $this->mensaje = $this->nmgp_dados_select['mensaje'];  
                  $this->correo_para_prueba = $this->nmgp_dados_select['correo_para_prueba'];  
                  $this->logo = $this->nmgp_dados_select['logo'];  
                  $this->enviar_documento_online = $this->nmgp_dados_select['enviar_documento_online'];  
                  $this->contacto_nombre = $this->nmgp_dados_select['contacto_nombre'];  
                  $this->contacto_cargo = $this->nmgp_dados_select['contacto_cargo'];  
                  $this->contacto_correo = $this->nmgp_dados_select['contacto_correo'];  
                  $this->contacto_celular = $this->nmgp_dados_select['contacto_celular'];  
                  $this->contacto_fijo = $this->nmgp_dados_select['contacto_fijo'];  
                  $this->servidor_facturas = $this->nmgp_dados_select['servidor_facturas'];  
                  $this->correo_copia = $this->nmgp_dados_select['correo_copia'];  
                  $this->direccion = $this->nmgp_dados_select['direccion'];  
                  $this->ciudad = $this->nmgp_dados_select['ciudad'];  
                  $this->pagina_web = $this->nmgp_dados_select['pagina_web'];  
                  $this->actividad_principal = $this->nmgp_dados_select['actividad_principal'];  
                  $this->regimen = $this->nmgp_dados_select['regimen'];  
                  $this->desviar_correo_a = $this->nmgp_dados_select['desviar_correo_a'];  
                  $this->pie_pagina = $this->nmgp_dados_select['pie_pagina'];  
                  $this->mensaje_nc = $this->nmgp_dados_select['mensaje_nc'];  
                  $this->pie_pagina_nc = $this->nmgp_dados_select['pie_pagina_nc'];  
                  $this->servidor_nc = $this->nmgp_dados_select['servidor_nc'];  
                  $this->informacion_adicional = $this->nmgp_dados_select['informacion_adicional'];  
                  $this->sumarimpuestosdeldetalle = $this->nmgp_dados_select['sumarimpuestosdeldetalle'];  
                  $this->serial = $this->nmgp_dados_select['serial'];  
                  $this->nombre_pc_red = $this->nmgp_dados_select['nombre_pc_red'];  
                  $this->proveedor = $this->nmgp_dados_select['proveedor'];  
                  $this->enviar_dian = $this->nmgp_dados_select['enviar_dian'];  
                  $this->enviar_cliente = $this->nmgp_dados_select['enviar_cliente'];  
                  $this->nit = $this->nmgp_dados_select['nit'];  
                  $this->razon_social = $this->nmgp_dados_select['razon_social'];  
                  $this->head_note = $this->nmgp_dados_select['head_note'];  
                  $this->tomar_municipio_tns = $this->nmgp_dados_select['tomar_municipio_tns'];  
                  $this->validar_codcliente_tns = $this->nmgp_dados_select['validar_codcliente_tns'];  
                  $this->desactivar_xml_enlista = $this->nmgp_dados_select['desactivar_xml_enlista'];  
                  $this->validar_correo_enlinea = $this->nmgp_dados_select['validar_correo_enlinea'];  
                  $this->url_validar_licencia = $this->nmgp_dados_select['url_validar_licencia'];  
                  $this->url_bouncer = $this->nmgp_dados_select['url_bouncer'];  
                  $this->apikey_bouncer = $this->nmgp_dados_select['apikey_bouncer'];  
                  $this->tiempo_bouncer = $this->nmgp_dados_select['tiempo_bouncer'];  
                  $this->enviar_datos_establecimiento = $this->nmgp_dados_select['enviar_datos_establecimiento'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['foreign_key'] as $sFKName => $sFKValue)
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_cloud_empresas_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_logo = "";  
   } 
   else 
   { 
       $out_logo = $this->logo;  
   } 
   if ($this->logo != "" && $this->logo != "none")   
   { 
       $path_logo = $this->Ini->root . $this->Ini->path_imagens . "/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . "/" . $this->logo;
       $md5_logo  = md5("/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . $this->logo);
       nm_fix_SubDirUpload($this->logo,$this->Ini->root . $this->Ini->path_imagens,"/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/");
        if (is_file($path_logo))  
       { 
           $NM_ler_img = true;
           $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $md5_logo . ".gif" ;  
           if (is_file($this->Ini->root . $out_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_logo = fopen($path_logo, "r") ; 
               $reg_logo = fread($tmp_logo, filesize($path_logo)) ; 
               fclose($tmp_logo) ;  
               $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
               fwrite($arq_logo, $reg_logo) ;  
               fclose($arq_logo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_logo, true);
           $this->nmgp_return_img['logo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['logo'][1] = $sc_obj_img->getWidth();
           $NM_redim_img = true;
           $out1_logo = $out_logo; 
           $md5_logo  = md5("/logos/" . $this->nm_tira_formatacao_id_empresa($this->id_empresa) . "/" . $this->logo);
           $out_logo = $this->Ini->path_imag_temp . "/sc_logo_200200" . $md5_logo . ".gif" ;  
           if (is_file($this->Ini->root . $out_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_redim_img = false;
               } 
           } 
           if ($NM_redim_img) 
           { 
               if (!$this->Ini->Gd_missing)
               { 
                   $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_logo, true);
                   $sc_obj_img->setWidth(200);
                   $sc_obj_img->setHeight(200);
                   $sc_obj_img->setManterAspecto(true);
                   $sc_obj_img->createImg($this->Ini->root . $out_logo);
               } 
               else 
               { 
                   $out_logo = $out1_logo;
               } 
           } 
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_logo;
           $out_logo = str_replace($this->Ini->path_imag_temp . "/", "", $out_logo);
       } 
       } 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_logo;
       if (isset($temp_out_logo))
       {
           $out_logo = $temp_out_logo;
       }
       global $temp_out1_logo;
       if (isset($temp_out1_logo))
       {
           $out1_logo = $temp_out1_logo;
       }
   }
        $this->initFormPages();
        include_once("form_cloud_empresas_mob_form0.php");
        include_once("form_cloud_empresas_mob_form1.php");
        include_once("form_cloud_empresas_mob_form2.php");
        include_once("form_cloud_empresas_mob_form3.php");
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
                                3 => 'on',
                        ),
                        'Pag3' => array(
                                4 => 'on',
                                5 => 'on',
                                6 => 'on',
                        ),
                        'Pag4' => array(
                                7 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'Pag1',
                        1 => 'Pag1',
                        2 => 'Pag2',
                        3 => 'Pag2',
                        4 => 'Pag3',
                        5 => 'Pag3',
                        6 => 'Pag3',
                        7 => 'Pag4',
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("id_empresa", "ccnit", "nombre_razonsocial", "celular", "correo", "activo", "creado", "editado"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['csrf_token'];
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

   function Form_lookup_activo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?S?@?";
       $nmgp_def_dados .= "NO?#?NO?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_regimen()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "RESPONSABLE DE IVA?#?RESPONSABLE DE IVA?#?N?@?";
       $nmgp_def_dados .= "NO RESPONSABLE DE IVA?#?NO RESPONSABLE DE IVA?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_proveedor()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "THE FACTORY?#?HKA?#?S?@?";
       $nmgp_def_dados .= "DATAICO?#?DATAICO?#?N?@?";
       $nmgp_def_dados .= "FACTURA TECH?#?TECH?#?N?@?";
       $nmgp_def_dados .= "FACILWEB?#?FACILWEB?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_modo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "DESARROLLO?#?DESARROLLO?#?N?@?";
       $nmgp_def_dados .= "PRODUCCIÓN?#?PRODUCCION?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_enviar_dian()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#?N?@?";
       $nmgp_def_dados .= "NO?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_enviar_cliente()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?1?#?N?@?";
       $nmgp_def_dados .= "NO?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_enviar_documento_online()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_smtp_tipo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "NO?#?NO?#?N?@?";
       $nmgp_def_dados .= "SSL?#?S?#?N?@?";
       $nmgp_def_dados .= "TLS?#?T?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_enviar_datos_establecimiento()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_sumarimpuestosdeldetalle()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_conf_auto_tercero()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_no_validar_mail()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tomar_municipio_tns()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_validar_codcliente_tns()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SI?#?SI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_desactivar_xml_enlista()
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
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_cloud_empresas_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "id_empresa", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ccnit", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "nombre_razonsocial", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "celular", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "correo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_activo($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "activo", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "creado", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "editado", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_cloud_empresas_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['total'] = $qt_geral_reg_form_cloud_empresas_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cloud_empresas_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_cloud_empresas_mob_pack_ajax_response();
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
      $nm_numeric[] = "id_empresa";$nm_numeric[] = "cantidaddecimales";$nm_numeric[] = "smtp_puerto";$nm_numeric[] = "enviar_dian";$nm_numeric[] = "enviar_cliente";$nm_numeric[] = "tiempo_bouncer";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['decimal_db'] == ".")
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
      $Nm_datas['creado'] = "timestamp";$Nm_datas['editado'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['SC_sep_date1'];
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
   function SC_lookup_activo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['SI'] = "SI";
       $data_look['NO'] = "NO";
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
       $nmgp_saida_form = "form_cloud_empresas_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_cloud_empresas_mob_fim.php";
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
       form_cloud_empresas_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_cloud_empresas_mob']['masterValue']);
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
}
?>
