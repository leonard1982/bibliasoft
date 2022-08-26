<?php
//
class form_terceros_contable_apl
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
                                'navPage'           => array(),
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
   var $idtercero_;
   var $documento_;
   var $nombres_;
   var $direccion_;
   var $tel_cel_;
   var $nacimiento_;
   var $sexo_;
   var $urlmail_;
   var $fechault_;
   var $saldo_;
   var $afiliacion_;
   var $idmuni_;
   var $observaciones_;
   var $credito_;
   var $cupo_;
   var $listaprecios_;
   var $loatiende_;
   var $con_actual_;
   var $con_actual__hora;
   var $efec_retencion_;
   var $regimen_;
   var $tipo_;
   var $cliente_;
   var $empleado_;
   var $proveedor_;
   var $contacto_;
   var $telefonos_prov_;
   var $email_;
   var $url_;
   var $creditoprov_;
   var $dias_;
   var $fechultcomp_;
   var $saldoapagar_;
   var $autoretenedor_;
   var $tipo_documento_;
   var $dv_;
   var $nombre1_;
   var $nombre2_;
   var $apellido1_;
   var $apellido2_;
   var $sucur_cliente_;
   var $representante_;
   var $imagenter_;
   var $imagenter__scfile_name;
   var $imagenter__ul_name;
   var $imagenter__scfile_type;
   var $imagenter__ul_type;
   var $imagenter__limpa;
   var $imagenter__salva;
   var $out_imagenter_;
   var $es_restaurante_;
   var $dias_credito_;
   var $dias_mora_;
   var $cupo_vendedor_;
   var $codigo_ter_;
   var $es_cajero_;
   var $autorizado_;
   var $zona_clientes_;
   var $clasificacion_clientes_;
   var $creado_;
   var $creado__hora;
   var $disponible_;
   var $id_pedido_tmp_;
   var $n_pedido_tmp_;
   var $total_pedido_tmp_;
   var $obs_pedido_tmp_;
   var $vend_pedido_tmp_;
   var $ciudad_;
   var $codigo_postal_;
   var $lenguaje_;
   var $nombre_comercil_;
   var $notificar_;
   var $puc_auxiliar_deudores_;
   var $puc_auxiliar_deudores__1;
   var $puc_retefuente_ventas_;
   var $puc_retefuente_servicios_clie_;
   var $puc_auxiliar_proveedores_;
   var $puc_auxiliar_proveedores__1;
   var $puc_retefuente_compras_;
   var $puc_retefuente_servicios_prov_;
   var $nube_;
   var $latitude_;
   var $longitude_;
   var $activo_;
   var $es_tecnico_;
   var $codigo_tercero_;
   var $porcentaje_propina_sugerida_;
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
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_after_all_delete = false;
   var $sc_max_reg = 10; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_terceros_contable = array();
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
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['cliente_']))
          {
              $this->cliente_ = $this->NM_ajax_info['param']['cliente_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['documento_']))
          {
              $this->documento_ = $this->NM_ajax_info['param']['documento_'];
          }
          if (isset($this->NM_ajax_info['param']['empleado_']))
          {
              $this->empleado_ = $this->NM_ajax_info['param']['empleado_'];
          }
          if (isset($this->NM_ajax_info['param']['idtercero_']))
          {
              $this->idtercero_ = $this->NM_ajax_info['param']['idtercero_'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nombres_']))
          {
              $this->nombres_ = $this->NM_ajax_info['param']['nombres_'];
          }
          if (isset($this->NM_ajax_info['param']['proveedor_']))
          {
              $this->proveedor_ = $this->NM_ajax_info['param']['proveedor_'];
          }
          if (isset($this->NM_ajax_info['param']['puc_auxiliar_deudores_']))
          {
              $this->puc_auxiliar_deudores_ = $this->NM_ajax_info['param']['puc_auxiliar_deudores_'];
          }
          if (isset($this->NM_ajax_info['param']['puc_auxiliar_proveedores_']))
          {
              $this->puc_auxiliar_proveedores_ = $this->NM_ajax_info['param']['puc_auxiliar_proveedores_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
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
      $this->sc_conv_var['idtercero'] = "idtercero_";
      $this->sc_conv_var['documento'] = "documento_";
      $this->sc_conv_var['nombres'] = "nombres_";
      $this->sc_conv_var['direccion'] = "direccion_";
      $this->sc_conv_var['tel_cel'] = "tel_cel_";
      $this->sc_conv_var['nacimiento'] = "nacimiento_";
      $this->sc_conv_var['sexo'] = "sexo_";
      $this->sc_conv_var['urlmail'] = "urlmail_";
      $this->sc_conv_var['fechault'] = "fechault_";
      $this->sc_conv_var['saldo'] = "saldo_";
      $this->sc_conv_var['afiliacion'] = "afiliacion_";
      $this->sc_conv_var['idmuni'] = "idmuni_";
      $this->sc_conv_var['observaciones'] = "observaciones_";
      $this->sc_conv_var['credito'] = "credito_";
      $this->sc_conv_var['cupo'] = "cupo_";
      $this->sc_conv_var['listaprecios'] = "listaprecios_";
      $this->sc_conv_var['loatiende'] = "loatiende_";
      $this->sc_conv_var['con_actual'] = "con_actual_";
      $this->sc_conv_var['efec_retencion'] = "efec_retencion_";
      $this->sc_conv_var['regimen'] = "regimen_";
      $this->sc_conv_var['tipo'] = "tipo_";
      $this->sc_conv_var['cliente'] = "cliente_";
      $this->sc_conv_var['empleado'] = "empleado_";
      $this->sc_conv_var['proveedor'] = "proveedor_";
      $this->sc_conv_var['contacto'] = "contacto_";
      $this->sc_conv_var['telefonos_prov'] = "telefonos_prov_";
      $this->sc_conv_var['email'] = "email_";
      $this->sc_conv_var['url'] = "url_";
      $this->sc_conv_var['creditoprov'] = "creditoprov_";
      $this->sc_conv_var['dias'] = "dias_";
      $this->sc_conv_var['fechultcomp'] = "fechultcomp_";
      $this->sc_conv_var['saldoapagar'] = "saldoapagar_";
      $this->sc_conv_var['autoretenedor'] = "autoretenedor_";
      $this->sc_conv_var['tipo_documento'] = "tipo_documento_";
      $this->sc_conv_var['dv'] = "dv_";
      $this->sc_conv_var['nombre1'] = "nombre1_";
      $this->sc_conv_var['nombre2'] = "nombre2_";
      $this->sc_conv_var['apellido1'] = "apellido1_";
      $this->sc_conv_var['apellido2'] = "apellido2_";
      $this->sc_conv_var['sucur_cliente'] = "sucur_cliente_";
      $this->sc_conv_var['representante'] = "representante_";
      $this->sc_conv_var['imagenter'] = "imagenter_";
      $this->sc_conv_var['es_restaurante'] = "es_restaurante_";
      $this->sc_conv_var['dias_credito'] = "dias_credito_";
      $this->sc_conv_var['dias_mora'] = "dias_mora_";
      $this->sc_conv_var['cupo_vendedor'] = "cupo_vendedor_";
      $this->sc_conv_var['codigo_ter'] = "codigo_ter_";
      $this->sc_conv_var['es_cajero'] = "es_cajero_";
      $this->sc_conv_var['autorizado'] = "autorizado_";
      $this->sc_conv_var['zona_clientes'] = "zona_clientes_";
      $this->sc_conv_var['clasificacion_clientes'] = "clasificacion_clientes_";
      $this->sc_conv_var['creado'] = "creado_";
      $this->sc_conv_var['disponible'] = "disponible_";
      $this->sc_conv_var['id_pedido_tmp'] = "id_pedido_tmp_";
      $this->sc_conv_var['n_pedido_tmp'] = "n_pedido_tmp_";
      $this->sc_conv_var['total_pedido_tmp'] = "total_pedido_tmp_";
      $this->sc_conv_var['obs_pedido_tmp'] = "obs_pedido_tmp_";
      $this->sc_conv_var['vend_pedido_tmp'] = "vend_pedido_tmp_";
      $this->sc_conv_var['ciudad'] = "ciudad_";
      $this->sc_conv_var['codigo_postal'] = "codigo_postal_";
      $this->sc_conv_var['lenguaje'] = "lenguaje_";
      $this->sc_conv_var['nombre_comercil'] = "nombre_comercil_";
      $this->sc_conv_var['notificar'] = "notificar_";
      $this->sc_conv_var['puc_auxiliar_deudores'] = "puc_auxiliar_deudores_";
      $this->sc_conv_var['puc_retefuente_ventas'] = "puc_retefuente_ventas_";
      $this->sc_conv_var['puc_retefuente_servicios_clie'] = "puc_retefuente_servicios_clie_";
      $this->sc_conv_var['puc_auxiliar_proveedores'] = "puc_auxiliar_proveedores_";
      $this->sc_conv_var['puc_retefuente_compras'] = "puc_retefuente_compras_";
      $this->sc_conv_var['puc_retefuente_servicios_prov'] = "puc_retefuente_servicios_prov_";
      $this->sc_conv_var['nube'] = "nube_";
      $this->sc_conv_var['latitude'] = "latitude_";
      $this->sc_conv_var['longitude'] = "longitude_";
      $this->sc_conv_var['activo'] = "activo_";
      $this->sc_conv_var['es_tecnico'] = "es_tecnico_";
      $this->sc_conv_var['codigo_tercero'] = "codigo_tercero_";
      $this->sc_conv_var['porcentaje_propina_sugerida'] = "porcentaje_propina_sugerida_";
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
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
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
                 nm_limpa_str_form_terceros_contable($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "idtercero_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= "idtercero = " . $this->idtercero_;
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_terceros_contable_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_terceros_contable']['upload_field_info']['imagenter_'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_terceros_contable',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_terceros_contable']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_terceros_contable'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_terceros_contable']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_terceros_contable']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_terceros_contable') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_terceros_contable']['label'] = "Editar Contable Terceros";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_terceros_contable")
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
      $this->Ini->Str_btn_form    = trim($str_button);
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
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status          = "scFormInputErrorMult";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorMultPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorMultPwdText";
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



      $_SESSION['scriptcase']['error_icon']['form_terceros_contable']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_terceros_contable'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new']  = "off";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['insert'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "on";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "on";
      $this->nmgp_botoes['reload'] = "off";
      }
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_terceros_contable']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_terceros_contable'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_terceros_contable'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_terceros_contable", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_terceros_contable_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_terceros_contable_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_terceros_contable/form_terceros_contable_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_terceros_contable_erro.class.php"); 
      }
      $this->Erro      = new form_terceros_contable_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao']))
         { 
             if ($this->idtercero_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_terceros_contable']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_terceros_contable']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
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
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- idtercero_
      $this->field_config['idtercero_']               = array();
      $this->field_config['idtercero_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idtercero_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idtercero_']['symbol_dec'] = '';
      $this->field_config['idtercero_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idtercero_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- nacimiento_
      $this->field_config['nacimiento_']                 = array();
      $this->field_config['nacimiento_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['nacimiento_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['nacimiento_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'nacimiento_');
      //-- fechault_
      $this->field_config['fechault_']                 = array();
      $this->field_config['fechault_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechault_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechault_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechault_');
      //-- saldo_
      $this->field_config['saldo_']               = array();
      $this->field_config['saldo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['saldo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['saldo_']['symbol_dec'] = '';
      $this->field_config['saldo_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['saldo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- afiliacion_
      $this->field_config['afiliacion_']                 = array();
      $this->field_config['afiliacion_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['afiliacion_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['afiliacion_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'afiliacion_');
      //-- idmuni_
      $this->field_config['idmuni_']               = array();
      $this->field_config['idmuni_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['idmuni_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['idmuni_']['symbol_dec'] = '';
      $this->field_config['idmuni_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['idmuni_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cupo_
      $this->field_config['cupo_']               = array();
      $this->field_config['cupo_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['cupo_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['cupo_']['symbol_dec'] = '';
      $this->field_config['cupo_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['cupo_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- listaprecios_
      $this->field_config['listaprecios_']               = array();
      $this->field_config['listaprecios_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['listaprecios_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['listaprecios_']['symbol_dec'] = '';
      $this->field_config['listaprecios_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['listaprecios_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- loatiende_
      $this->field_config['loatiende_']               = array();
      $this->field_config['loatiende_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['loatiende_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['loatiende_']['symbol_dec'] = '';
      $this->field_config['loatiende_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['loatiende_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- con_actual_
      $this->field_config['con_actual_']                 = array();
      $this->field_config['con_actual_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['con_actual_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['con_actual_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['con_actual_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'con_actual_');
      //-- dias_
      $this->field_config['dias_']               = array();
      $this->field_config['dias_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dias_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dias_']['symbol_dec'] = '';
      $this->field_config['dias_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dias_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- fechultcomp_
      $this->field_config['fechultcomp_']                 = array();
      $this->field_config['fechultcomp_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['fechultcomp_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['fechultcomp_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fechultcomp_');
      //-- saldoapagar_
      $this->field_config['saldoapagar_']               = array();
      $this->field_config['saldoapagar_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['saldoapagar_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['saldoapagar_']['symbol_dec'] = '';
      $this->field_config['saldoapagar_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['saldoapagar_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dv_
      $this->field_config['dv_']               = array();
      $this->field_config['dv_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dv_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dv_']['symbol_dec'] = '';
      $this->field_config['dv_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dv_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dias_credito_
      $this->field_config['dias_credito_']               = array();
      $this->field_config['dias_credito_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dias_credito_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dias_credito_']['symbol_dec'] = '';
      $this->field_config['dias_credito_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dias_credito_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- dias_mora_
      $this->field_config['dias_mora_']               = array();
      $this->field_config['dias_mora_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['dias_mora_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['dias_mora_']['symbol_dec'] = '';
      $this->field_config['dias_mora_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['dias_mora_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- cupo_vendedor_
      $this->field_config['cupo_vendedor_']               = array();
      $this->field_config['cupo_vendedor_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['cupo_vendedor_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['cupo_vendedor_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['cupo_vendedor_']['symbol_mon'] = '';
      $this->field_config['cupo_vendedor_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['cupo_vendedor_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- zona_clientes_
      $this->field_config['zona_clientes_']               = array();
      $this->field_config['zona_clientes_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['zona_clientes_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['zona_clientes_']['symbol_dec'] = '';
      $this->field_config['zona_clientes_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['zona_clientes_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- clasificacion_clientes_
      $this->field_config['clasificacion_clientes_']               = array();
      $this->field_config['clasificacion_clientes_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['clasificacion_clientes_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['clasificacion_clientes_']['symbol_dec'] = '';
      $this->field_config['clasificacion_clientes_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['clasificacion_clientes_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- creado_
      $this->field_config['creado_']                 = array();
      $this->field_config['creado_']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['creado_']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['creado_']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['creado_']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'creado_');
      //-- id_pedido_tmp_
      $this->field_config['id_pedido_tmp_']               = array();
      $this->field_config['id_pedido_tmp_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id_pedido_tmp_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id_pedido_tmp_']['symbol_dec'] = '';
      $this->field_config['id_pedido_tmp_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id_pedido_tmp_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- total_pedido_tmp_
      $this->field_config['total_pedido_tmp_']               = array();
      $this->field_config['total_pedido_tmp_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_val'];
      $this->field_config['total_pedido_tmp_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['total_pedido_tmp_']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_val'];
      $this->field_config['total_pedido_tmp_']['symbol_mon'] = '';
      $this->field_config['total_pedido_tmp_']['format_pos'] = $_SESSION['scriptcase']['reg_conf']['monet_f_pos'];
      $this->field_config['total_pedido_tmp_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['monet_f_neg'];
      //-- porcentaje_propina_sugerida_
      $this->field_config['porcentaje_propina_sugerida_']               = array();
      $this->field_config['porcentaje_propina_sugerida_']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['porcentaje_propina_sugerida_']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['porcentaje_propina_sugerida_']['symbol_dec'] = '';
      $this->field_config['porcentaje_propina_sugerida_']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['porcentaje_propina_sugerida_']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          $this->NM_btn_navega = "N";
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_max_reg'] = $this->nmgp_max_line;
      }
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

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opc_edit'] = true;  
      $sc_contr_vert = (isset($GLOBALS["sc_contr_vert"])) ? $GLOBALS["sc_contr_vert"] : "";
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (isset($GLOBALS["sc_check_vert"]) && is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_terceros_contable_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_terceros_contable_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
         if (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
         if (isset($this->puc_auxiliar_deudores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_deudores_); }
         if (isset($this->puc_auxiliar_proveedores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_proveedores_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_form'][$sc_seq_vert];
             $this->idtercero_ = $this->nmgp_dados_form['idtercero_']; 
             if ($this->nmgp_opcao == "incluir"){$this->documento_ = $this->nmgp_dados_form['documento_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->nombres_ = $this->nmgp_dados_form['nombres_'];} 
             $this->direccion_ = $this->nmgp_dados_form['direccion_']; 
             $this->tel_cel_ = $this->nmgp_dados_form['tel_cel_']; 
             $this->nacimiento_ = $this->nmgp_dados_form['nacimiento_']; 
             $this->sexo_ = $this->nmgp_dados_form['sexo_']; 
             $this->urlmail_ = $this->nmgp_dados_form['urlmail_']; 
             $this->fechault_ = $this->nmgp_dados_form['fechault_']; 
             $this->saldo_ = $this->nmgp_dados_form['saldo_']; 
             $this->afiliacion_ = $this->nmgp_dados_form['afiliacion_']; 
             $this->idmuni_ = $this->nmgp_dados_form['idmuni_']; 
             $this->observaciones_ = $this->nmgp_dados_form['observaciones_']; 
             $this->credito_ = $this->nmgp_dados_form['credito_']; 
             $this->cupo_ = $this->nmgp_dados_form['cupo_']; 
             $this->listaprecios_ = $this->nmgp_dados_form['listaprecios_']; 
             $this->loatiende_ = $this->nmgp_dados_form['loatiende_']; 
             $this->con_actual_ = $this->nmgp_dados_form['con_actual_']; 
             $this->efec_retencion_ = $this->nmgp_dados_form['efec_retencion_']; 
             $this->regimen_ = $this->nmgp_dados_form['regimen_']; 
             $this->tipo_ = $this->nmgp_dados_form['tipo_']; 
             if ($this->nmgp_opcao == "incluir"){$this->cliente_ = $this->nmgp_dados_form['cliente_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->empleado_ = $this->nmgp_dados_form['empleado_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->proveedor_ = $this->nmgp_dados_form['proveedor_'];} 
             $this->contacto_ = $this->nmgp_dados_form['contacto_']; 
             $this->telefonos_prov_ = $this->nmgp_dados_form['telefonos_prov_']; 
             $this->email_ = $this->nmgp_dados_form['email_']; 
             $this->url_ = $this->nmgp_dados_form['url_']; 
             $this->creditoprov_ = $this->nmgp_dados_form['creditoprov_']; 
             $this->dias_ = $this->nmgp_dados_form['dias_']; 
             $this->fechultcomp_ = $this->nmgp_dados_form['fechultcomp_']; 
             $this->saldoapagar_ = $this->nmgp_dados_form['saldoapagar_']; 
             $this->autoretenedor_ = $this->nmgp_dados_form['autoretenedor_']; 
             $this->tipo_documento_ = $this->nmgp_dados_form['tipo_documento_']; 
             $this->dv_ = $this->nmgp_dados_form['dv_']; 
             $this->nombre1_ = $this->nmgp_dados_form['nombre1_']; 
             $this->nombre2_ = $this->nmgp_dados_form['nombre2_']; 
             $this->apellido1_ = $this->nmgp_dados_form['apellido1_']; 
             $this->apellido2_ = $this->nmgp_dados_form['apellido2_']; 
             $this->sucur_cliente_ = $this->nmgp_dados_form['sucur_cliente_']; 
             $this->representante_ = $this->nmgp_dados_form['representante_']; 
             $this->imagenter_ = $this->nmgp_dados_form['imagenter_']; 
             $this->es_restaurante_ = $this->nmgp_dados_form['es_restaurante_']; 
             $this->dias_credito_ = $this->nmgp_dados_form['dias_credito_']; 
             $this->dias_mora_ = $this->nmgp_dados_form['dias_mora_']; 
             $this->cupo_vendedor_ = $this->nmgp_dados_form['cupo_vendedor_']; 
             $this->codigo_ter_ = $this->nmgp_dados_form['codigo_ter_']; 
             $this->es_cajero_ = $this->nmgp_dados_form['es_cajero_']; 
             $this->autorizado_ = $this->nmgp_dados_form['autorizado_']; 
             $this->zona_clientes_ = $this->nmgp_dados_form['zona_clientes_']; 
             $this->clasificacion_clientes_ = $this->nmgp_dados_form['clasificacion_clientes_']; 
             $this->creado_ = $this->nmgp_dados_form['creado_']; 
             $this->disponible_ = $this->nmgp_dados_form['disponible_']; 
             $this->id_pedido_tmp_ = $this->nmgp_dados_form['id_pedido_tmp_']; 
             $this->n_pedido_tmp_ = $this->nmgp_dados_form['n_pedido_tmp_']; 
             $this->total_pedido_tmp_ = $this->nmgp_dados_form['total_pedido_tmp_']; 
             $this->obs_pedido_tmp_ = $this->nmgp_dados_form['obs_pedido_tmp_']; 
             $this->vend_pedido_tmp_ = $this->nmgp_dados_form['vend_pedido_tmp_']; 
             $this->ciudad_ = $this->nmgp_dados_form['ciudad_']; 
             $this->codigo_postal_ = $this->nmgp_dados_form['codigo_postal_']; 
             $this->lenguaje_ = $this->nmgp_dados_form['lenguaje_']; 
             $this->nombre_comercil_ = $this->nmgp_dados_form['nombre_comercil_']; 
             $this->notificar_ = $this->nmgp_dados_form['notificar_']; 
             $this->puc_retefuente_ventas_ = $this->nmgp_dados_form['puc_retefuente_ventas_']; 
             $this->puc_retefuente_servicios_clie_ = $this->nmgp_dados_form['puc_retefuente_servicios_clie_']; 
             $this->puc_retefuente_compras_ = $this->nmgp_dados_form['puc_retefuente_compras_']; 
             $this->puc_retefuente_servicios_prov_ = $this->nmgp_dados_form['puc_retefuente_servicios_prov_']; 
             $this->nube_ = $this->nmgp_dados_form['nube_']; 
             $this->latitude_ = $this->nmgp_dados_form['latitude_']; 
             $this->longitude_ = $this->nmgp_dados_form['longitude_']; 
             $this->activo_ = $this->nmgp_dados_form['activo_']; 
             $this->es_tecnico_ = $this->nmgp_dados_form['es_tecnico_']; 
             $this->codigo_tercero_ = $this->nmgp_dados_form['codigo_tercero_']; 
             $this->porcentaje_propina_sugerida_ = $this->nmgp_dados_form['porcentaje_propina_sugerida_']; 
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_terceros_contable']) || !is_array($this->NM_ajax_info['errList']['geral_form_terceros_contable']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_terceros_contable'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_terceros_contable'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_terceros_contable'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_terceros_contable'][] = $this->Campos_Mens_erro;
                  }
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
		if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
		}
		if ('incluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmi']);
		}
		if ('excluir' == $this->NM_ajax_info['param']['nmgp_opcao'] && 'ERROR' != $this->NM_ajax_info['result']) {
			$this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmd']);
		}
         form_terceros_contable_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_documento_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'documento_');
          }
          if ('validate_nombres_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nombres_');
          }
          if ('validate_cliente_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cliente_');
          }
          if ('validate_empleado_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'empleado_');
          }
          if ('validate_proveedor_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'proveedor_');
          }
          if ('validate_puc_auxiliar_proveedores_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'puc_auxiliar_proveedores_');
          }
          if ('validate_puc_auxiliar_deudores_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'puc_auxiliar_deudores_');
          }
          form_terceros_contable_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["documento_" . $sc_seq_vert]))
         { 
             $GLOBALS["documento_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['documento_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["nombres_" . $sc_seq_vert]))
         { 
             $GLOBALS["nombres_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['nombres_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["cliente_" . $sc_seq_vert]))
         { 
             $GLOBALS["cliente_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['cliente_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["empleado_" . $sc_seq_vert]))
         { 
             $GLOBALS["empleado_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['empleado_'];
         } 
         if ($this->nmgp_opcao == "recarga" && !isset($GLOBALS["proveedor_" . $sc_seq_vert]))
         { 
             $GLOBALS["proveedor_" . $sc_seq_vert] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['proveedor_'];
         } 
         $this->documento_ = $GLOBALS["documento_" . $sc_seq_vert]; 
         $this->nombres_ = $GLOBALS["nombres_" . $sc_seq_vert]; 
         $this->cliente_ = $GLOBALS["cliente_" . $sc_seq_vert]; 
         $this->empleado_ = $GLOBALS["empleado_" . $sc_seq_vert]; 
         $this->proveedor_ = $GLOBALS["proveedor_" . $sc_seq_vert]; 
         $this->puc_auxiliar_proveedores_ = $GLOBALS["puc_auxiliar_proveedores_" . $sc_seq_vert]; 
         $this->puc_auxiliar_deudores_ = $GLOBALS["puc_auxiliar_deudores_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_form'][$sc_seq_vert];
             $this->idtercero_ = $this->nmgp_dados_form['idtercero_']; 
             if ($this->nmgp_opcao == "incluir"){$this->documento_ = $this->nmgp_dados_form['documento_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->nombres_ = $this->nmgp_dados_form['nombres_'];} 
             $this->direccion_ = $this->nmgp_dados_form['direccion_']; 
             $this->tel_cel_ = $this->nmgp_dados_form['tel_cel_']; 
             $this->nacimiento_ = $this->nmgp_dados_form['nacimiento_']; 
             $this->sexo_ = $this->nmgp_dados_form['sexo_']; 
             $this->urlmail_ = $this->nmgp_dados_form['urlmail_']; 
             $this->fechault_ = $this->nmgp_dados_form['fechault_']; 
             $this->saldo_ = $this->nmgp_dados_form['saldo_']; 
             $this->afiliacion_ = $this->nmgp_dados_form['afiliacion_']; 
             $this->idmuni_ = $this->nmgp_dados_form['idmuni_']; 
             $this->observaciones_ = $this->nmgp_dados_form['observaciones_']; 
             $this->credito_ = $this->nmgp_dados_form['credito_']; 
             $this->cupo_ = $this->nmgp_dados_form['cupo_']; 
             $this->listaprecios_ = $this->nmgp_dados_form['listaprecios_']; 
             $this->loatiende_ = $this->nmgp_dados_form['loatiende_']; 
             $this->con_actual_ = $this->nmgp_dados_form['con_actual_']; 
             $this->efec_retencion_ = $this->nmgp_dados_form['efec_retencion_']; 
             $this->regimen_ = $this->nmgp_dados_form['regimen_']; 
             $this->tipo_ = $this->nmgp_dados_form['tipo_']; 
             if ($this->nmgp_opcao == "incluir"){$this->cliente_ = $this->nmgp_dados_form['cliente_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->empleado_ = $this->nmgp_dados_form['empleado_'];} 
             if ($this->nmgp_opcao == "incluir"){$this->proveedor_ = $this->nmgp_dados_form['proveedor_'];} 
             $this->contacto_ = $this->nmgp_dados_form['contacto_']; 
             $this->telefonos_prov_ = $this->nmgp_dados_form['telefonos_prov_']; 
             $this->email_ = $this->nmgp_dados_form['email_']; 
             $this->url_ = $this->nmgp_dados_form['url_']; 
             $this->creditoprov_ = $this->nmgp_dados_form['creditoprov_']; 
             $this->dias_ = $this->nmgp_dados_form['dias_']; 
             $this->fechultcomp_ = $this->nmgp_dados_form['fechultcomp_']; 
             $this->saldoapagar_ = $this->nmgp_dados_form['saldoapagar_']; 
             $this->autoretenedor_ = $this->nmgp_dados_form['autoretenedor_']; 
             $this->tipo_documento_ = $this->nmgp_dados_form['tipo_documento_']; 
             $this->dv_ = $this->nmgp_dados_form['dv_']; 
             $this->nombre1_ = $this->nmgp_dados_form['nombre1_']; 
             $this->nombre2_ = $this->nmgp_dados_form['nombre2_']; 
             $this->apellido1_ = $this->nmgp_dados_form['apellido1_']; 
             $this->apellido2_ = $this->nmgp_dados_form['apellido2_']; 
             $this->sucur_cliente_ = $this->nmgp_dados_form['sucur_cliente_']; 
             $this->representante_ = $this->nmgp_dados_form['representante_']; 
             $this->imagenter_ = $this->nmgp_dados_form['imagenter_']; 
             $this->es_restaurante_ = $this->nmgp_dados_form['es_restaurante_']; 
             $this->dias_credito_ = $this->nmgp_dados_form['dias_credito_']; 
             $this->dias_mora_ = $this->nmgp_dados_form['dias_mora_']; 
             $this->cupo_vendedor_ = $this->nmgp_dados_form['cupo_vendedor_']; 
             $this->codigo_ter_ = $this->nmgp_dados_form['codigo_ter_']; 
             $this->es_cajero_ = $this->nmgp_dados_form['es_cajero_']; 
             $this->autorizado_ = $this->nmgp_dados_form['autorizado_']; 
             $this->zona_clientes_ = $this->nmgp_dados_form['zona_clientes_']; 
             $this->clasificacion_clientes_ = $this->nmgp_dados_form['clasificacion_clientes_']; 
             $this->creado_ = $this->nmgp_dados_form['creado_']; 
             $this->disponible_ = $this->nmgp_dados_form['disponible_']; 
             $this->id_pedido_tmp_ = $this->nmgp_dados_form['id_pedido_tmp_']; 
             $this->n_pedido_tmp_ = $this->nmgp_dados_form['n_pedido_tmp_']; 
             $this->total_pedido_tmp_ = $this->nmgp_dados_form['total_pedido_tmp_']; 
             $this->obs_pedido_tmp_ = $this->nmgp_dados_form['obs_pedido_tmp_']; 
             $this->vend_pedido_tmp_ = $this->nmgp_dados_form['vend_pedido_tmp_']; 
             $this->ciudad_ = $this->nmgp_dados_form['ciudad_']; 
             $this->codigo_postal_ = $this->nmgp_dados_form['codigo_postal_']; 
             $this->lenguaje_ = $this->nmgp_dados_form['lenguaje_']; 
             $this->nombre_comercil_ = $this->nmgp_dados_form['nombre_comercil_']; 
             $this->notificar_ = $this->nmgp_dados_form['notificar_']; 
             $this->puc_retefuente_ventas_ = $this->nmgp_dados_form['puc_retefuente_ventas_']; 
             $this->puc_retefuente_servicios_clie_ = $this->nmgp_dados_form['puc_retefuente_servicios_clie_']; 
             $this->puc_retefuente_compras_ = $this->nmgp_dados_form['puc_retefuente_compras_']; 
             $this->puc_retefuente_servicios_prov_ = $this->nmgp_dados_form['puc_retefuente_servicios_prov_']; 
             $this->nube_ = $this->nmgp_dados_form['nube_']; 
             $this->latitude_ = $this->nmgp_dados_form['latitude_']; 
             $this->longitude_ = $this->nmgp_dados_form['longitude_']; 
             $this->activo_ = $this->nmgp_dados_form['activo_']; 
             $this->es_tecnico_ = $this->nmgp_dados_form['es_tecnico_']; 
             $this->codigo_tercero_ = $this->nmgp_dados_form['codigo_tercero_']; 
             $this->porcentaje_propina_sugerida_ = $this->nmgp_dados_form['porcentaje_propina_sugerida_']; 
         }
         if (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
         if (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
         if (isset($this->puc_auxiliar_deudores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_deudores_); }
         if (isset($this->puc_auxiliar_proveedores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_proveedores_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && (!in_array($sc_seq_vert, $sc_check_excl) && !in_array($sc_seq_vert, $sc_check_incl) ))
         { }
         else
         {
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['documento_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_disabled'][$sc_seq_vert]['documento_']))
             { 
                 $this->documento_ = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['documento_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['nombres_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_disabled'][$sc_seq_vert]['nombres_']))
             { 
                 $this->nombres_ = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['nombres_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['cliente_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_disabled'][$sc_seq_vert]['cliente_']))
             { 
                 $this->cliente_ = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['cliente_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['empleado_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_disabled'][$sc_seq_vert]['empleado_']))
             { 
                 $this->empleado_ = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['empleado_'];
             } 
             if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['proveedor_']) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_disabled'][$sc_seq_vert]['proveedor_']))
             { 
                 $this->proveedor_ = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['proveedor_'];
             } 
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['documento_'] =  $this->documento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombres_'] =  $this->nombres_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cliente_'] =  $this->cliente_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['proveedor_'] =  $this->proveedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_auxiliar_proveedores_'] =  $this->puc_auxiliar_proveedores_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_auxiliar_deudores_'] =  $this->puc_auxiliar_deudores_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['idtercero_'] =  $this->idtercero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['direccion_'] =  $this->direccion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tel_cel_'] =  $this->tel_cel_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nacimiento_'] =  $this->nacimiento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['sexo_'] =  $this->sexo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['urlmail_'] =  $this->urlmail_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['fechault_'] =  $this->fechault_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['saldo_'] =  $this->saldo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['afiliacion_'] =  $this->afiliacion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['idmuni_'] =  $this->idmuni_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['credito_'] =  $this->credito_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cupo_'] =  $this->cupo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['listaprecios_'] =  $this->listaprecios_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['loatiende_'] =  $this->loatiende_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['con_actual_'] =  $this->con_actual_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['con_actual__hora'] =  $this->con_actual__hora; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['efec_retencion_'] =  $this->efec_retencion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['regimen_'] =  $this->regimen_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['contacto_'] =  $this->contacto_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['telefonos_prov_'] =  $this->telefonos_prov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['url_'] =  $this->url_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creditoprov_'] =  $this->creditoprov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_'] =  $this->dias_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['fechultcomp_'] =  $this->fechultcomp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['saldoapagar_'] =  $this->saldoapagar_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['autoretenedor_'] =  $this->autoretenedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dv_'] =  $this->dv_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre1_'] =  $this->nombre1_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre2_'] =  $this->nombre2_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['apellido1_'] =  $this->apellido1_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['apellido2_'] =  $this->apellido2_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['sucur_cliente_'] =  $this->sucur_cliente_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['representante_'] =  $this->representante_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['imagenter_'] =  $this->imagenter_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['imagenter__limpa'] =  $this->imagenter__limpa; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_restaurante_'] =  $this->es_restaurante_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_credito_'] =  $this->dias_credito_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_mora_'] =  $this->dias_mora_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cupo_vendedor_'] =  $this->cupo_vendedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_ter_'] =  $this->codigo_ter_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_cajero_'] =  $this->es_cajero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['autorizado_'] =  $this->autorizado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['zona_clientes_'] =  $this->zona_clientes_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['clasificacion_clientes_'] =  $this->clasificacion_clientes_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creado_'] =  $this->creado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creado__hora'] =  $this->creado__hora; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['disponible_'] =  $this->disponible_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['id_pedido_tmp_'] =  $this->id_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['n_pedido_tmp_'] =  $this->n_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['total_pedido_tmp_'] =  $this->total_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['obs_pedido_tmp_'] =  $this->obs_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['vend_pedido_tmp_'] =  $this->vend_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['ciudad_'] =  $this->ciudad_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_postal_'] =  $this->codigo_postal_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['lenguaje_'] =  $this->lenguaje_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre_comercil_'] =  $this->nombre_comercil_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['notificar_'] =  $this->notificar_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_ventas_'] =  $this->puc_retefuente_ventas_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_servicios_clie_'] =  $this->puc_retefuente_servicios_clie_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_compras_'] =  $this->puc_retefuente_compras_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_servicios_prov_'] =  $this->puc_retefuente_servicios_prov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nube_'] =  $this->nube_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['latitude_'] =  $this->latitude_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['longitude_'] =  $this->longitude_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['activo_'] =  $this->activo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_tecnico_'] =  $this->es_tecnico_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_tercero_'] =  $this->codigo_tercero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['porcentaje_propina_sugerida_'] =  $this->porcentaje_propina_sugerida_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt) 
          { 
              $this->sc_after_all_update = true;
          }
          if ($this->sc_teve_excl) 
          { 
              $this->sc_after_all_delete = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_terceros_contable_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_terceros_contable);
          $this->NM_ajax_info['fldList']['idtercero_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['idtercero_']);
          $this->NM_close_db();
          form_terceros_contable_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (isset($this->documento_))
          { 
              $SV_documento_ = $this->documento_;
          } 
          if (isset($this->nombres_))
          { 
              $SV_nombres_ = $this->nombres_;
          } 
          if (isset($this->cliente_))
          { 
              $SV_cliente_ = $this->cliente_;
          } 
          if (isset($this->empleado_))
          { 
              $SV_empleado_ = $this->empleado_;
          } 
          if (isset($this->proveedor_))
          { 
              $SV_proveedor_ = $this->proveedor_;
          } 
          $this->nm_tira_formatacao();
          if (isset($SV_documento_) && $this->nmgp_opcao != "recarga")
          { 
              $this->documento_ = $SV_documento_;
          } 
          if (isset($SV_nombres_) && $this->nmgp_opcao != "recarga")
          { 
              $this->nombres_ = $SV_nombres_;
          } 
          if (isset($SV_cliente_) && $this->nmgp_opcao != "recarga")
          { 
              $this->cliente_ = $SV_cliente_;
          } 
          if (isset($SV_empleado_) && $this->nmgp_opcao != "recarga")
          { 
              $this->empleado_ = $SV_empleado_;
          } 
          if (isset($SV_proveedor_) && $this->nmgp_opcao != "recarga")
          { 
              $this->proveedor_ = $SV_proveedor_;
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_terceros_contable_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_terceros_contable']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
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
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_terceros_contable.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Editar Contable Terceros") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
<form name="Fdown" method="get" action="form_terceros_contable_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_terceros_contable"> 
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
           case 'documento_':
               return "Documento";
               break;
           case 'nombres_':
               return "Nombres";
               break;
           case 'cliente_':
               return "Cliente";
               break;
           case 'empleado_':
               return "Empleado";
               break;
           case 'proveedor_':
               return "Proveedor";
               break;
           case 'puc_auxiliar_proveedores_':
               return "P.U.C Auxiliar Proveedores";
               break;
           case 'puc_auxiliar_deudores_':
               return "P.U.C Auxiliar Deudores";
               break;
           case 'idtercero_':
               return "Idtercero";
               break;
           case 'direccion_':
               return "Direccion";
               break;
           case 'tel_cel_':
               return "Tel Cel";
               break;
           case 'nacimiento_':
               return "Nacimiento";
               break;
           case 'sexo_':
               return "Sexo";
               break;
           case 'urlmail_':
               return "Urlmail";
               break;
           case 'fechault_':
               return "Fechault";
               break;
           case 'saldo_':
               return "Saldo";
               break;
           case 'afiliacion_':
               return "Afiliacion";
               break;
           case 'idmuni_':
               return "Idmuni";
               break;
           case 'observaciones_':
               return "Observaciones";
               break;
           case 'credito_':
               return "Credito";
               break;
           case 'cupo_':
               return "Cupo";
               break;
           case 'listaprecios_':
               return "Listaprecios";
               break;
           case 'loatiende_':
               return "Loatiende";
               break;
           case 'con_actual_':
               return "Con Actual";
               break;
           case 'efec_retencion_':
               return "Efec Retencion";
               break;
           case 'regimen_':
               return "Regimen";
               break;
           case 'tipo_':
               return "Tipo";
               break;
           case 'contacto_':
               return "Contacto";
               break;
           case 'telefonos_prov_':
               return "Telefonos Prov";
               break;
           case 'email_':
               return "Email";
               break;
           case 'url_':
               return "Url";
               break;
           case 'creditoprov_':
               return "Creditoprov";
               break;
           case 'dias_':
               return "Dias";
               break;
           case 'fechultcomp_':
               return "Fechultcomp";
               break;
           case 'saldoapagar_':
               return "Saldoapagar";
               break;
           case 'autoretenedor_':
               return "Autoretenedor";
               break;
           case 'tipo_documento_':
               return "Tipo Documento";
               break;
           case 'dv_':
               return "Dv";
               break;
           case 'nombre1_':
               return "Nombre 1";
               break;
           case 'nombre2_':
               return "Nombre 2";
               break;
           case 'apellido1_':
               return "Apellido 1";
               break;
           case 'apellido2_':
               return "Apellido 2";
               break;
           case 'sucur_cliente_':
               return "Sucur Cliente";
               break;
           case 'representante_':
               return "Representante";
               break;
           case 'imagenter_':
               return "Imagenter";
               break;
           case 'es_restaurante_':
               return "Es Restaurante";
               break;
           case 'dias_credito_':
               return "Dias Credito";
               break;
           case 'dias_mora_':
               return "Dias Mora";
               break;
           case 'cupo_vendedor_':
               return "Cupo Vendedor";
               break;
           case 'codigo_ter_':
               return "Codigo Ter";
               break;
           case 'es_cajero_':
               return "Es Cajero";
               break;
           case 'autorizado_':
               return "Autorizado";
               break;
           case 'zona_clientes_':
               return "Zona Clientes";
               break;
           case 'clasificacion_clientes_':
               return "Clasificacion Clientes";
               break;
           case 'creado_':
               return "Creado";
               break;
           case 'disponible_':
               return "Disponible";
               break;
           case 'id_pedido_tmp_':
               return "Id Pedido Tmp";
               break;
           case 'n_pedido_tmp_':
               return "N Pedido Tmp";
               break;
           case 'total_pedido_tmp_':
               return "Total Pedido Tmp";
               break;
           case 'obs_pedido_tmp_':
               return "Obs Pedido Tmp";
               break;
           case 'vend_pedido_tmp_':
               return "Vend Pedido Tmp";
               break;
           case 'ciudad_':
               return "Ciudad";
               break;
           case 'codigo_postal_':
               return "Codigo Postal";
               break;
           case 'lenguaje_':
               return "Lenguaje";
               break;
           case 'nombre_comercil_':
               return "Nombre Comercil";
               break;
           case 'notificar_':
               return "Notificar";
               break;
           case 'puc_retefuente_ventas_':
               return "Puc Retefuente Ventas";
               break;
           case 'puc_retefuente_servicios_clie_':
               return "Puc Retefuente Servicios Clie";
               break;
           case 'puc_retefuente_compras_':
               return "Puc Retefuente Compras";
               break;
           case 'puc_retefuente_servicios_prov_':
               return "Puc Retefuente Servicios Prov";
               break;
           case 'nube_':
               return "Nube";
               break;
           case 'latitude_':
               return "Latitude";
               break;
           case 'longitude_':
               return "Longitude";
               break;
           case 'activo_':
               return "Activo";
               break;
           case 'es_tecnico_':
               return "Es Tecnico";
               break;
           case 'codigo_tercero_':
               return "Codigo Tercero";
               break;
           case 'porcentaje_propina_sugerida_':
               return "Porcentaje Propina Sugerida";
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
     global $nm_browser, $teste_validade, $sc_seq_vert;
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_terceros_contable']) || !is_array($this->NM_ajax_info['errList']['geral_form_terceros_contable']))
              {
                  $this->NM_ajax_info['errList']['geral_form_terceros_contable'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_terceros_contable'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'documento_' == $filtro)) || (is_array($filtro) && in_array('documento_', $filtro)))
        $this->ValidateField_documento_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'nombres_' == $filtro)) || (is_array($filtro) && in_array('nombres_', $filtro)))
        $this->ValidateField_nombres_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'cliente_' == $filtro)) || (is_array($filtro) && in_array('cliente_', $filtro)))
        $this->ValidateField_cliente_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'empleado_' == $filtro)) || (is_array($filtro) && in_array('empleado_', $filtro)))
        $this->ValidateField_empleado_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'proveedor_' == $filtro)) || (is_array($filtro) && in_array('proveedor_', $filtro)))
        $this->ValidateField_proveedor_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'puc_auxiliar_proveedores_' == $filtro)) || (is_array($filtro) && in_array('puc_auxiliar_proveedores_', $filtro)))
        $this->ValidateField_puc_auxiliar_proveedores_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'puc_auxiliar_deudores_' == $filtro)) || (is_array($filtro) && in_array('puc_auxiliar_deudores_', $filtro)))
        $this->ValidateField_puc_auxiliar_deudores_($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_documento_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->documento_) > 14) 
          { 
              $hasError = true;
              $Campos_Crit .= "Documento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['documento_']))
              {
                  $Campos_Erros['documento_'] = array();
              }
              $Campos_Erros['documento_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['documento_']) || !is_array($this->NM_ajax_info['errList']['documento_']))
              {
                  $this->NM_ajax_info['errList']['documento_'] = array();
              }
              $this->NM_ajax_info['errList']['documento_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 14 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'documento_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_documento_

    function ValidateField_nombres_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nombres_) > 120) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombres " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nombres_']))
              {
                  $Campos_Erros['nombres_'] = array();
              }
              $Campos_Erros['nombres_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nombres_']) || !is_array($this->NM_ajax_info['errList']['nombres_']))
              {
                  $this->NM_ajax_info['errList']['nombres_'] = array();
              }
              $this->NM_ajax_info['errList']['nombres_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'nombres_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_nombres_

    function ValidateField_cliente_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cliente_) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Cliente " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cliente_']))
              {
                  $Campos_Erros['cliente_'] = array();
              }
              $Campos_Erros['cliente_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cliente_']) || !is_array($this->NM_ajax_info['errList']['cliente_']))
              {
                  $this->NM_ajax_info['errList']['cliente_'] = array();
              }
              $this->NM_ajax_info['errList']['cliente_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'cliente_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_cliente_

    function ValidateField_empleado_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->empleado_) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Empleado " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['empleado_']))
              {
                  $Campos_Erros['empleado_'] = array();
              }
              $Campos_Erros['empleado_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['empleado_']) || !is_array($this->NM_ajax_info['errList']['empleado_']))
              {
                  $this->NM_ajax_info['errList']['empleado_'] = array();
              }
              $this->NM_ajax_info['errList']['empleado_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'empleado_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_empleado_

    function ValidateField_proveedor_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->proveedor_) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Proveedor " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['proveedor_']))
              {
                  $Campos_Erros['proveedor_'] = array();
              }
              $Campos_Erros['proveedor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['proveedor_']) || !is_array($this->NM_ajax_info['errList']['proveedor_']))
              {
                  $this->NM_ajax_info['errList']['proveedor_'] = array();
              }
              $this->NM_ajax_info['errList']['proveedor_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'proveedor_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_proveedor_

    function ValidateField_puc_auxiliar_proveedores_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->puc_auxiliar_proveedores_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']) && !in_array($this->puc_auxiliar_proveedores_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['puc_auxiliar_proveedores_']))
                   {
                       $Campos_Erros['puc_auxiliar_proveedores_'] = array();
                   }
                   $Campos_Erros['puc_auxiliar_proveedores_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['puc_auxiliar_proveedores_']) || !is_array($this->NM_ajax_info['errList']['puc_auxiliar_proveedores_']))
                   {
                       $this->NM_ajax_info['errList']['puc_auxiliar_proveedores_'] = array();
                   }
                   $this->NM_ajax_info['errList']['puc_auxiliar_proveedores_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'puc_auxiliar_proveedores_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_puc_auxiliar_proveedores_

    function ValidateField_puc_auxiliar_deudores_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->puc_auxiliar_deudores_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']) && !in_array($this->puc_auxiliar_deudores_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['puc_auxiliar_deudores_']))
                   {
                       $Campos_Erros['puc_auxiliar_deudores_'] = array();
                   }
                   $Campos_Erros['puc_auxiliar_deudores_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['puc_auxiliar_deudores_']) || !is_array($this->NM_ajax_info['errList']['puc_auxiliar_deudores_']))
                   {
                       $this->NM_ajax_info['errList']['puc_auxiliar_deudores_'] = array();
                   }
                   $this->NM_ajax_info['errList']['puc_auxiliar_deudores_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'puc_auxiliar_deudores_';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_puc_auxiliar_deudores_

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
    $this->nmgp_dados_form['documento_'] = $this->documento_;
    $this->nmgp_dados_form['nombres_'] = $this->nombres_;
    $this->nmgp_dados_form['cliente_'] = $this->cliente_;
    $this->nmgp_dados_form['empleado_'] = $this->empleado_;
    $this->nmgp_dados_form['proveedor_'] = $this->proveedor_;
    $this->nmgp_dados_form['puc_auxiliar_proveedores_'] = $this->puc_auxiliar_proveedores_;
    $this->nmgp_dados_form['puc_auxiliar_deudores_'] = $this->puc_auxiliar_deudores_;
    $this->nmgp_dados_form['idtercero_'] = $this->idtercero_;
    $this->nmgp_dados_form['direccion_'] = $this->direccion_;
    $this->nmgp_dados_form['tel_cel_'] = $this->tel_cel_;
    $this->nmgp_dados_form['nacimiento_'] = $this->nacimiento_;
    $this->nmgp_dados_form['sexo_'] = $this->sexo_;
    $this->nmgp_dados_form['urlmail_'] = $this->urlmail_;
    $this->nmgp_dados_form['fechault_'] = $this->fechault_;
    $this->nmgp_dados_form['saldo_'] = $this->saldo_;
    $this->nmgp_dados_form['afiliacion_'] = $this->afiliacion_;
    $this->nmgp_dados_form['idmuni_'] = $this->idmuni_;
    $this->nmgp_dados_form['observaciones_'] = $this->observaciones_;
    $this->nmgp_dados_form['credito_'] = $this->credito_;
    $this->nmgp_dados_form['cupo_'] = $this->cupo_;
    $this->nmgp_dados_form['listaprecios_'] = $this->listaprecios_;
    $this->nmgp_dados_form['loatiende_'] = $this->loatiende_;
    $this->nmgp_dados_form['con_actual_'] = $this->con_actual_;
    $this->nmgp_dados_form['efec_retencion_'] = $this->efec_retencion_;
    $this->nmgp_dados_form['regimen_'] = $this->regimen_;
    $this->nmgp_dados_form['tipo_'] = $this->tipo_;
    $this->nmgp_dados_form['contacto_'] = $this->contacto_;
    $this->nmgp_dados_form['telefonos_prov_'] = $this->telefonos_prov_;
    $this->nmgp_dados_form['email_'] = $this->email_;
    $this->nmgp_dados_form['url_'] = $this->url_;
    $this->nmgp_dados_form['creditoprov_'] = $this->creditoprov_;
    $this->nmgp_dados_form['dias_'] = $this->dias_;
    $this->nmgp_dados_form['fechultcomp_'] = $this->fechultcomp_;
    $this->nmgp_dados_form['saldoapagar_'] = $this->saldoapagar_;
    $this->nmgp_dados_form['autoretenedor_'] = $this->autoretenedor_;
    $this->nmgp_dados_form['tipo_documento_'] = $this->tipo_documento_;
    $this->nmgp_dados_form['dv_'] = $this->dv_;
    $this->nmgp_dados_form['nombre1_'] = $this->nombre1_;
    $this->nmgp_dados_form['nombre2_'] = $this->nombre2_;
    $this->nmgp_dados_form['apellido1_'] = $this->apellido1_;
    $this->nmgp_dados_form['apellido2_'] = $this->apellido2_;
    $this->nmgp_dados_form['sucur_cliente_'] = $this->sucur_cliente_;
    $this->nmgp_dados_form['representante_'] = $this->representante_;
    $this->nmgp_dados_form['imagenter_'] = $this->imagenter_;
    $this->nmgp_dados_form['imagenter__limpa'] = $this->imagenter__limpa;
    $this->nmgp_dados_form['es_restaurante_'] = $this->es_restaurante_;
    $this->nmgp_dados_form['dias_credito_'] = $this->dias_credito_;
    $this->nmgp_dados_form['dias_mora_'] = $this->dias_mora_;
    $this->nmgp_dados_form['cupo_vendedor_'] = $this->cupo_vendedor_;
    $this->nmgp_dados_form['codigo_ter_'] = $this->codigo_ter_;
    $this->nmgp_dados_form['es_cajero_'] = $this->es_cajero_;
    $this->nmgp_dados_form['autorizado_'] = $this->autorizado_;
    $this->nmgp_dados_form['zona_clientes_'] = $this->zona_clientes_;
    $this->nmgp_dados_form['clasificacion_clientes_'] = $this->clasificacion_clientes_;
    $this->nmgp_dados_form['creado_'] = $this->creado_;
    $this->nmgp_dados_form['disponible_'] = $this->disponible_;
    $this->nmgp_dados_form['id_pedido_tmp_'] = $this->id_pedido_tmp_;
    $this->nmgp_dados_form['n_pedido_tmp_'] = $this->n_pedido_tmp_;
    $this->nmgp_dados_form['total_pedido_tmp_'] = $this->total_pedido_tmp_;
    $this->nmgp_dados_form['obs_pedido_tmp_'] = $this->obs_pedido_tmp_;
    $this->nmgp_dados_form['vend_pedido_tmp_'] = $this->vend_pedido_tmp_;
    $this->nmgp_dados_form['ciudad_'] = $this->ciudad_;
    $this->nmgp_dados_form['codigo_postal_'] = $this->codigo_postal_;
    $this->nmgp_dados_form['lenguaje_'] = $this->lenguaje_;
    $this->nmgp_dados_form['nombre_comercil_'] = $this->nombre_comercil_;
    $this->nmgp_dados_form['notificar_'] = $this->notificar_;
    $this->nmgp_dados_form['puc_retefuente_ventas_'] = $this->puc_retefuente_ventas_;
    $this->nmgp_dados_form['puc_retefuente_servicios_clie_'] = $this->puc_retefuente_servicios_clie_;
    $this->nmgp_dados_form['puc_retefuente_compras_'] = $this->puc_retefuente_compras_;
    $this->nmgp_dados_form['puc_retefuente_servicios_prov_'] = $this->puc_retefuente_servicios_prov_;
    $this->nmgp_dados_form['nube_'] = $this->nube_;
    $this->nmgp_dados_form['latitude_'] = $this->latitude_;
    $this->nmgp_dados_form['longitude_'] = $this->longitude_;
    $this->nmgp_dados_form['activo_'] = $this->activo_;
    $this->nmgp_dados_form['es_tecnico_'] = $this->es_tecnico_;
    $this->nmgp_dados_form['codigo_tercero_'] = $this->codigo_tercero_;
    $this->nmgp_dados_form['porcentaje_propina_sugerida_'] = $this->porcentaje_propina_sugerida_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['idtercero_'] = $this->idtercero_;
      nm_limpa_numero($this->idtercero_, $this->field_config['idtercero_']['symbol_grp']) ; 
      $this->Before_unformat['nacimiento_'] = $this->nacimiento_;
      nm_limpa_data($this->nacimiento_, $this->field_config['nacimiento_']['date_sep']) ; 
      $this->Before_unformat['fechault_'] = $this->fechault_;
      nm_limpa_data($this->fechault_, $this->field_config['fechault_']['date_sep']) ; 
      $this->Before_unformat['saldo_'] = $this->saldo_;
      nm_limpa_numero($this->saldo_, $this->field_config['saldo_']['symbol_grp']) ; 
      $this->Before_unformat['afiliacion_'] = $this->afiliacion_;
      nm_limpa_data($this->afiliacion_, $this->field_config['afiliacion_']['date_sep']) ; 
      $this->Before_unformat['idmuni_'] = $this->idmuni_;
      nm_limpa_numero($this->idmuni_, $this->field_config['idmuni_']['symbol_grp']) ; 
      $this->Before_unformat['cupo_'] = $this->cupo_;
      nm_limpa_numero($this->cupo_, $this->field_config['cupo_']['symbol_grp']) ; 
      $this->Before_unformat['listaprecios_'] = $this->listaprecios_;
      nm_limpa_numero($this->listaprecios_, $this->field_config['listaprecios_']['symbol_grp']) ; 
      $this->Before_unformat['loatiende_'] = $this->loatiende_;
      nm_limpa_numero($this->loatiende_, $this->field_config['loatiende_']['symbol_grp']) ; 
      $this->Before_unformat['con_actual_'] = $this->con_actual_;
      $this->Before_unformat['con_actual__hora'] = $this->con_actual__hora;
      nm_limpa_data($this->con_actual_, $this->field_config['con_actual_']['date_sep']) ; 
      nm_limpa_hora($this->con_actual__hora, $this->field_config['con_actual_']['time_sep']) ; 
      $this->Before_unformat['dias_'] = $this->dias_;
      nm_limpa_numero($this->dias_, $this->field_config['dias_']['symbol_grp']) ; 
      $this->Before_unformat['fechultcomp_'] = $this->fechultcomp_;
      nm_limpa_data($this->fechultcomp_, $this->field_config['fechultcomp_']['date_sep']) ; 
      $this->Before_unformat['saldoapagar_'] = $this->saldoapagar_;
      nm_limpa_numero($this->saldoapagar_, $this->field_config['saldoapagar_']['symbol_grp']) ; 
      $this->Before_unformat['dv_'] = $this->dv_;
      nm_limpa_numero($this->dv_, $this->field_config['dv_']['symbol_grp']) ; 
      $this->Before_unformat['dias_credito_'] = $this->dias_credito_;
      nm_limpa_numero($this->dias_credito_, $this->field_config['dias_credito_']['symbol_grp']) ; 
      $this->Before_unformat['dias_mora_'] = $this->dias_mora_;
      nm_limpa_numero($this->dias_mora_, $this->field_config['dias_mora_']['symbol_grp']) ; 
      $this->Before_unformat['cupo_vendedor_'] = $this->cupo_vendedor_;
      if (!empty($this->field_config['cupo_vendedor_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->cupo_vendedor_, $this->field_config['cupo_vendedor_']['symbol_dec'], $this->field_config['cupo_vendedor_']['symbol_grp'], $this->field_config['cupo_vendedor_']['symbol_mon']);
         nm_limpa_valor($this->cupo_vendedor_, $this->field_config['cupo_vendedor_']['symbol_dec'], $this->field_config['cupo_vendedor_']['symbol_grp']);
      }
      $this->Before_unformat['zona_clientes_'] = $this->zona_clientes_;
      nm_limpa_numero($this->zona_clientes_, $this->field_config['zona_clientes_']['symbol_grp']) ; 
      $this->Before_unformat['clasificacion_clientes_'] = $this->clasificacion_clientes_;
      nm_limpa_numero($this->clasificacion_clientes_, $this->field_config['clasificacion_clientes_']['symbol_grp']) ; 
      $this->Before_unformat['creado_'] = $this->creado_;
      $this->Before_unformat['creado__hora'] = $this->creado__hora;
      nm_limpa_data($this->creado_, $this->field_config['creado_']['date_sep']) ; 
      nm_limpa_hora($this->creado__hora, $this->field_config['creado_']['time_sep']) ; 
      $this->Before_unformat['id_pedido_tmp_'] = $this->id_pedido_tmp_;
      nm_limpa_numero($this->id_pedido_tmp_, $this->field_config['id_pedido_tmp_']['symbol_grp']) ; 
      $this->Before_unformat['total_pedido_tmp_'] = $this->total_pedido_tmp_;
      if (!empty($this->field_config['total_pedido_tmp_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->total_pedido_tmp_, $this->field_config['total_pedido_tmp_']['symbol_dec'], $this->field_config['total_pedido_tmp_']['symbol_grp'], $this->field_config['total_pedido_tmp_']['symbol_mon']);
         nm_limpa_valor($this->total_pedido_tmp_, $this->field_config['total_pedido_tmp_']['symbol_dec'], $this->field_config['total_pedido_tmp_']['symbol_grp']);
      }
      $this->Before_unformat['porcentaje_propina_sugerida_'] = $this->porcentaje_propina_sugerida_;
      nm_limpa_numero($this->porcentaje_propina_sugerida_, $this->field_config['porcentaje_propina_sugerida_']['symbol_grp']) ; 
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
      if ($Nome_Campo == "idtercero_")
      {
          nm_limpa_numero($this->idtercero_, $this->field_config['idtercero_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "saldo_")
      {
          nm_limpa_numero($this->saldo_, $this->field_config['saldo_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "idmuni_")
      {
          nm_limpa_numero($this->idmuni_, $this->field_config['idmuni_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cupo_")
      {
          nm_limpa_numero($this->cupo_, $this->field_config['cupo_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "listaprecios_")
      {
          nm_limpa_numero($this->listaprecios_, $this->field_config['listaprecios_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "loatiende_")
      {
          nm_limpa_numero($this->loatiende_, $this->field_config['loatiende_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dias_")
      {
          nm_limpa_numero($this->dias_, $this->field_config['dias_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "saldoapagar_")
      {
          nm_limpa_numero($this->saldoapagar_, $this->field_config['saldoapagar_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dv_")
      {
          nm_limpa_numero($this->dv_, $this->field_config['dv_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dias_credito_")
      {
          nm_limpa_numero($this->dias_credito_, $this->field_config['dias_credito_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "dias_mora_")
      {
          nm_limpa_numero($this->dias_mora_, $this->field_config['dias_mora_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "cupo_vendedor_")
      {
          if (!empty($this->field_config['cupo_vendedor_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->cupo_vendedor_, $this->field_config['cupo_vendedor_']['symbol_dec'], $this->field_config['cupo_vendedor_']['symbol_grp'], $this->field_config['cupo_vendedor_']['symbol_mon']);
             nm_limpa_valor($this->cupo_vendedor_, $this->field_config['cupo_vendedor_']['symbol_dec'], $this->field_config['cupo_vendedor_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "zona_clientes_")
      {
          nm_limpa_numero($this->zona_clientes_, $this->field_config['zona_clientes_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "clasificacion_clientes_")
      {
          nm_limpa_numero($this->clasificacion_clientes_, $this->field_config['clasificacion_clientes_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_pedido_tmp_")
      {
          nm_limpa_numero($this->id_pedido_tmp_, $this->field_config['id_pedido_tmp_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "total_pedido_tmp_")
      {
          if (!empty($this->field_config['total_pedido_tmp_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->total_pedido_tmp_, $this->field_config['total_pedido_tmp_']['symbol_dec'], $this->field_config['total_pedido_tmp_']['symbol_grp'], $this->field_config['total_pedido_tmp_']['symbol_mon']);
             nm_limpa_valor($this->total_pedido_tmp_, $this->field_config['total_pedido_tmp_']['symbol_dec'], $this->field_config['total_pedido_tmp_']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "porcentaje_propina_sugerida_")
      {
          nm_limpa_numero($this->porcentaje_propina_sugerida_, $this->field_config['porcentaje_propina_sugerida_']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['idtercero_']['keyVal'] = form_terceros_contable_pack_protect_string($this->nmgp_dados_form['idtercero_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['documento_']) && $this->NM_ajax_changed['documento_'])
                  {
                      $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['documento_'] = $this->documento_;
                  }
                  if (isset($this->NM_ajax_changed['nombres_']) && $this->NM_ajax_changed['nombres_'])
                  {
                      $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['nombres_'] = $this->nombres_;
                  }
                  if (isset($this->NM_ajax_changed['cliente_']) && $this->NM_ajax_changed['cliente_'])
                  {
                      $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['cliente_'] = $this->cliente_;
                  }
                  if (isset($this->NM_ajax_changed['empleado_']) && $this->NM_ajax_changed['empleado_'])
                  {
                      $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['empleado_'] = $this->empleado_;
                  }
                  if (isset($this->NM_ajax_changed['proveedor_']) && $this->NM_ajax_changed['proveedor_'])
                  {
                      $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['proveedor_'] = $this->proveedor_;
                  }
                  if (isset($this->NM_ajax_changed['puc_auxiliar_proveedores_']) && $this->NM_ajax_changed['puc_auxiliar_proveedores_'])
                  {
                      $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['puc_auxiliar_proveedores_'] = $this->puc_auxiliar_proveedores_;
                  }
                  if (isset($this->NM_ajax_changed['puc_auxiliar_deudores_']) && $this->NM_ajax_changed['puc_auxiliar_deudores_'])
                  {
                      $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['puc_auxiliar_deudores_'] = $this->puc_auxiliar_deudores_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['documento_'] = $this->documento_;
              $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['nombres_'] = $this->nombres_;
              $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['puc_auxiliar_proveedores_'] = $this->puc_auxiliar_proveedores_;
              $this->form_vert_form_terceros_contable[$this->nmgp_refresh_row]['puc_auxiliar_deudores_'] = $this->puc_auxiliar_deudores_;
          }
          $this->NM_ajax_info['rsSize']            = sizeof($this->form_vert_form_terceros_contable);
          $this->NM_ajax_info['buttonDisplayVert'] = array();
          foreach($this->form_vert_form_terceros_contable as $sc_seq_vert => $aRecData)
          {
              $this->loadRecordState($sc_seq_vert);
              if ('navigate_form' == $this->NM_ajax_opcao) {
                  $this->NM_ajax_info['buttonDisplayVert'][] = array(
                      'seq'      => $sc_seq_vert,
                      'gridView' => false,
                      'delete'   => $this->nmgp_botoes['delete'],
                      'update'   => $this->nmgp_botoes['update'],
                  );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("documento_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['documento_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['documento_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nombres_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nombres_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nombres_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cliente_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['cliente_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['cliente_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("empleado_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['empleado_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['empleado_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("proveedor_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['proveedor_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['proveedor_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("puc_auxiliar_proveedores_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['puc_auxiliar_proveedores_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array(); 
}
$aLookup[] = array(form_terceros_contable_pack_protect_string('') => str_replace('<', '&lt;',form_terceros_contable_pack_protect_string('Seleccione')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre)  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"puc_auxiliar_proveedores_\"";
          if (isset($this->NM_ajax_info['select_html']['puc_auxiliar_proveedores_']) && !empty($this->NM_ajax_info['select_html']['puc_auxiliar_proveedores_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['puc_auxiliar_proveedores_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $sc_seq_vert]['valList'][$i] = form_terceros_contable_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("puc_auxiliar_deudores_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['puc_auxiliar_deudores_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array(); 
}
$aLookup[] = array(form_terceros_contable_pack_protect_string('') => str_replace('<', '&lt;',form_terceros_contable_pack_protect_string('Seleccione')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre)  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"puc_auxiliar_deudores_\"";
          if (isset($this->NM_ajax_info['select_html']['puc_auxiliar_deudores_']) && !empty($this->NM_ajax_info['select_html']['puc_auxiliar_deudores_']))
          {
              eval("\$sSelComp = \"" . str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['puc_auxiliar_deudores_']) . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $sc_seq_vert]['valList'][$i] = form_terceros_contable_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $sc_seq_vert]['labList'] = $aLabel;
              }
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload_record($sc_seq_vert=0)
  {
  }
  function nm_proc_onload($bFormat = true)
  {
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
      $this->cupo_vendedor_ = str_replace($sc_parm1, $sc_parm2, $this->cupo_vendedor_); 
      $this->total_pedido_tmp_ = str_replace($sc_parm1, $sc_parm2, $this->total_pedido_tmp_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->cupo_vendedor_ = "'" . $this->cupo_vendedor_ . "'";
      $this->total_pedido_tmp_ = "'" . $this->total_pedido_tmp_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->cupo_vendedor_ = str_replace("'", "", $this->cupo_vendedor_); 
      $this->total_pedido_tmp_ = str_replace("'", "", $this->total_pedido_tmp_); 
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
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
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
      if ($this->nmgp_opcao == "alterar")
      {
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['documento_'] == $this->documento_ &&
              $this->nmgp_dados_select['nombres_'] == $this->nombres_ &&
              $this->nmgp_dados_select['cliente_'] == $this->cliente_ &&
              $this->nmgp_dados_select['empleado_'] == $this->empleado_ &&
              $this->nmgp_dados_select['proveedor_'] == $this->proveedor_ &&
              $this->nmgp_dados_select['puc_auxiliar_proveedores_'] == $this->puc_auxiliar_proveedores_ &&
              $this->nmgp_dados_select['puc_auxiliar_deudores_'] == $this->puc_auxiliar_deudores_)
          { }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['documento_'] = $this->documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['nombres_'] = $this->nombres_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['cliente_'] = $this->cliente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['empleado_'] = $this->empleado_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['proveedor_'] = $this->proveedor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['puc_auxiliar_proveedores_'] = $this->puc_auxiliar_proveedores_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['puc_auxiliar_deudores_'] = $this->puc_auxiliar_deudores_;
          }
      }
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
      $NM_val_form['documento_'] = $this->documento_;
      $NM_val_form['nombres_'] = $this->nombres_;
      $NM_val_form['cliente_'] = $this->cliente_;
      $NM_val_form['empleado_'] = $this->empleado_;
      $NM_val_form['proveedor_'] = $this->proveedor_;
      $NM_val_form['puc_auxiliar_proveedores_'] = $this->puc_auxiliar_proveedores_;
      $NM_val_form['puc_auxiliar_deudores_'] = $this->puc_auxiliar_deudores_;
      $NM_val_form['idtercero_'] = $this->idtercero_;
      $NM_val_form['direccion_'] = $this->direccion_;
      $NM_val_form['tel_cel_'] = $this->tel_cel_;
      $NM_val_form['nacimiento_'] = $this->nacimiento_;
      $NM_val_form['sexo_'] = $this->sexo_;
      $NM_val_form['urlmail_'] = $this->urlmail_;
      $NM_val_form['fechault_'] = $this->fechault_;
      $NM_val_form['saldo_'] = $this->saldo_;
      $NM_val_form['afiliacion_'] = $this->afiliacion_;
      $NM_val_form['idmuni_'] = $this->idmuni_;
      $NM_val_form['observaciones_'] = $this->observaciones_;
      $NM_val_form['credito_'] = $this->credito_;
      $NM_val_form['cupo_'] = $this->cupo_;
      $NM_val_form['listaprecios_'] = $this->listaprecios_;
      $NM_val_form['loatiende_'] = $this->loatiende_;
      $NM_val_form['con_actual_'] = $this->con_actual_;
      $NM_val_form['efec_retencion_'] = $this->efec_retencion_;
      $NM_val_form['regimen_'] = $this->regimen_;
      $NM_val_form['tipo_'] = $this->tipo_;
      $NM_val_form['contacto_'] = $this->contacto_;
      $NM_val_form['telefonos_prov_'] = $this->telefonos_prov_;
      $NM_val_form['email_'] = $this->email_;
      $NM_val_form['url_'] = $this->url_;
      $NM_val_form['creditoprov_'] = $this->creditoprov_;
      $NM_val_form['dias_'] = $this->dias_;
      $NM_val_form['fechultcomp_'] = $this->fechultcomp_;
      $NM_val_form['saldoapagar_'] = $this->saldoapagar_;
      $NM_val_form['autoretenedor_'] = $this->autoretenedor_;
      $NM_val_form['tipo_documento_'] = $this->tipo_documento_;
      $NM_val_form['dv_'] = $this->dv_;
      $NM_val_form['nombre1_'] = $this->nombre1_;
      $NM_val_form['nombre2_'] = $this->nombre2_;
      $NM_val_form['apellido1_'] = $this->apellido1_;
      $NM_val_form['apellido2_'] = $this->apellido2_;
      $NM_val_form['sucur_cliente_'] = $this->sucur_cliente_;
      $NM_val_form['representante_'] = $this->representante_;
      $NM_val_form['imagenter_'] = $this->imagenter_;
      $NM_val_form['es_restaurante_'] = $this->es_restaurante_;
      $NM_val_form['dias_credito_'] = $this->dias_credito_;
      $NM_val_form['dias_mora_'] = $this->dias_mora_;
      $NM_val_form['cupo_vendedor_'] = $this->cupo_vendedor_;
      $NM_val_form['codigo_ter_'] = $this->codigo_ter_;
      $NM_val_form['es_cajero_'] = $this->es_cajero_;
      $NM_val_form['autorizado_'] = $this->autorizado_;
      $NM_val_form['zona_clientes_'] = $this->zona_clientes_;
      $NM_val_form['clasificacion_clientes_'] = $this->clasificacion_clientes_;
      $NM_val_form['creado_'] = $this->creado_;
      $NM_val_form['disponible_'] = $this->disponible_;
      $NM_val_form['id_pedido_tmp_'] = $this->id_pedido_tmp_;
      $NM_val_form['n_pedido_tmp_'] = $this->n_pedido_tmp_;
      $NM_val_form['total_pedido_tmp_'] = $this->total_pedido_tmp_;
      $NM_val_form['obs_pedido_tmp_'] = $this->obs_pedido_tmp_;
      $NM_val_form['vend_pedido_tmp_'] = $this->vend_pedido_tmp_;
      $NM_val_form['ciudad_'] = $this->ciudad_;
      $NM_val_form['codigo_postal_'] = $this->codigo_postal_;
      $NM_val_form['lenguaje_'] = $this->lenguaje_;
      $NM_val_form['nombre_comercil_'] = $this->nombre_comercil_;
      $NM_val_form['notificar_'] = $this->notificar_;
      $NM_val_form['puc_retefuente_ventas_'] = $this->puc_retefuente_ventas_;
      $NM_val_form['puc_retefuente_servicios_clie_'] = $this->puc_retefuente_servicios_clie_;
      $NM_val_form['puc_retefuente_compras_'] = $this->puc_retefuente_compras_;
      $NM_val_form['puc_retefuente_servicios_prov_'] = $this->puc_retefuente_servicios_prov_;
      $NM_val_form['nube_'] = $this->nube_;
      $NM_val_form['latitude_'] = $this->latitude_;
      $NM_val_form['longitude_'] = $this->longitude_;
      $NM_val_form['activo_'] = $this->activo_;
      $NM_val_form['es_tecnico_'] = $this->es_tecnico_;
      $NM_val_form['codigo_tercero_'] = $this->codigo_tercero_;
      $NM_val_form['porcentaje_propina_sugerida_'] = $this->porcentaje_propina_sugerida_;
      if ($this->idtercero_ === "" || is_null($this->idtercero_))  
      { 
          $this->idtercero_ = 0;
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->saldo_ === "" || is_null($this->saldo_))  
      { 
          $this->saldo_ = 0;
          $this->sc_force_zero[] = 'saldo_';
      } 
      if ($this->idmuni_ === "" || is_null($this->idmuni_))  
      { 
          $this->idmuni_ = 0;
          $this->sc_force_zero[] = 'idmuni_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->cupo_ === "" || is_null($this->cupo_))  
      { 
          $this->cupo_ = 0;
          $this->sc_force_zero[] = 'cupo_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->listaprecios_ === "" || is_null($this->listaprecios_))  
      { 
          $this->listaprecios_ = 0;
          $this->sc_force_zero[] = 'listaprecios_';
      } 
      }
      if ($this->loatiende_ === "" || is_null($this->loatiende_))  
      { 
          $this->loatiende_ = 0;
          $this->sc_force_zero[] = 'loatiende_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->dias_ === "" || is_null($this->dias_))  
      { 
          $this->dias_ = 0;
          $this->sc_force_zero[] = 'dias_';
      } 
      if ($this->saldoapagar_ === "" || is_null($this->saldoapagar_))  
      { 
          $this->saldoapagar_ = 0;
          $this->sc_force_zero[] = 'saldoapagar_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->dv_ === "" || is_null($this->dv_))  
      { 
          $this->dv_ = 0;
          $this->sc_force_zero[] = 'dv_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->dias_credito_ === "" || is_null($this->dias_credito_))  
      { 
          $this->dias_credito_ = 0;
          $this->sc_force_zero[] = 'dias_credito_';
      } 
      if ($this->dias_mora_ === "" || is_null($this->dias_mora_))  
      { 
          $this->dias_mora_ = 0;
          $this->sc_force_zero[] = 'dias_mora_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->cupo_vendedor_ === "" || is_null($this->cupo_vendedor_))  
      { 
          $this->cupo_vendedor_ = 0;
          $this->sc_force_zero[] = 'cupo_vendedor_';
      } 
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->zona_clientes_ === "" || is_null($this->zona_clientes_))  
      { 
          $this->zona_clientes_ = 0;
          $this->sc_force_zero[] = 'zona_clientes_';
      } 
      if ($this->clasificacion_clientes_ === "" || is_null($this->clasificacion_clientes_))  
      { 
          $this->clasificacion_clientes_ = 0;
          $this->sc_force_zero[] = 'clasificacion_clientes_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->id_pedido_tmp_ === "" || is_null($this->id_pedido_tmp_))  
      { 
          $this->id_pedido_tmp_ = 0;
          $this->sc_force_zero[] = 'id_pedido_tmp_';
      } 
      if ($this->nmgp_opcao == "alterar")
      {
      if ($this->total_pedido_tmp_ === "" || is_null($this->total_pedido_tmp_))  
      { 
          $this->total_pedido_tmp_ = 0;
          $this->sc_force_zero[] = 'total_pedido_tmp_';
      } 
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
      if ($this->nmgp_opcao == "alterar")
      {
      }
      if ($this->porcentaje_propina_sugerida_ === "" || is_null($this->porcentaje_propina_sugerida_))  
      { 
          $this->porcentaje_propina_sugerida_ = 0;
          $this->sc_force_zero[] = 'porcentaje_propina_sugerida_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->documento__before_qstr = $this->documento_;
          $this->documento_ = substr($this->Db->qstr($this->documento_), 1, -1); 
          if ($this->documento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->documento_ = "null"; 
              $NM_val_null[] = "documento_";
          } 
          $this->nombres__before_qstr = $this->nombres_;
          $this->nombres_ = substr($this->Db->qstr($this->nombres_), 1, -1); 
          if ($this->nombres_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombres_ = "null"; 
              $NM_val_null[] = "nombres_";
          } 
          $this->direccion__before_qstr = $this->direccion_;
          $this->direccion_ = substr($this->Db->qstr($this->direccion_), 1, -1); 
          if ($this->direccion_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->direccion_ = "null"; 
              $NM_val_null[] = "direccion_";
          } 
          $this->tel_cel__before_qstr = $this->tel_cel_;
          $this->tel_cel_ = substr($this->Db->qstr($this->tel_cel_), 1, -1); 
          if ($this->tel_cel_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tel_cel_ = "null"; 
              $NM_val_null[] = "tel_cel_";
          } 
          if ($this->nacimiento_ == "")  
          { 
              $this->nacimiento_ = "null"; 
              $NM_val_null[] = "nacimiento_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->sexo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->sexo_ = "null"; 
                  $NM_val_null[] = "sexo_";
              } 
          }
          $this->urlmail__before_qstr = $this->urlmail_;
          $this->urlmail_ = substr($this->Db->qstr($this->urlmail_), 1, -1); 
          if ($this->urlmail_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->urlmail_ = "null"; 
              $NM_val_null[] = "urlmail_";
          } 
          if ($this->fechault_ == "")  
          { 
              $this->fechault_ = "null"; 
              $NM_val_null[] = "fechault_";
          } 
          if ($this->afiliacion_ == "")  
          { 
              $this->afiliacion_ = "null"; 
              $NM_val_null[] = "afiliacion_";
          } 
          $this->observaciones__before_qstr = $this->observaciones_;
          $this->observaciones_ = substr($this->Db->qstr($this->observaciones_), 1, -1); 
          if ($this->observaciones_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observaciones_ = "null"; 
              $NM_val_null[] = "observaciones_";
          } 
          $this->credito__before_qstr = $this->credito_;
          $this->credito_ = substr($this->Db->qstr($this->credito_), 1, -1); 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->credito_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->credito_ = "null"; 
                  $NM_val_null[] = "credito_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->con_actual_ == "")  
              { 
                  $this->con_actual_ = "null"; 
                  $NM_val_null[] = "con_actual_";
              } 
              if ($this->con_actual_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->con_actual_ = "null"; 
                  $NM_val_null[] = "con_actual_";
              } 
          }
          if ($this->efec_retencion_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->efec_retencion_ = "null"; 
              $NM_val_null[] = "efec_retencion_";
          } 
          if ($this->regimen_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->regimen_ = "null"; 
              $NM_val_null[] = "regimen_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipo_ = "null"; 
                  $NM_val_null[] = "tipo_";
              } 
          }
          if ($this->cliente_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cliente_ = "null"; 
              $NM_val_null[] = "cliente_";
          } 
          if ($this->empleado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->empleado_ = "null"; 
              $NM_val_null[] = "empleado_";
          } 
          if ($this->proveedor_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->proveedor_ = "null"; 
              $NM_val_null[] = "proveedor_";
          } 
          $this->contacto__before_qstr = $this->contacto_;
          $this->contacto_ = substr($this->Db->qstr($this->contacto_), 1, -1); 
          if ($this->contacto_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contacto_ = "null"; 
              $NM_val_null[] = "contacto_";
          } 
          $this->telefonos_prov__before_qstr = $this->telefonos_prov_;
          $this->telefonos_prov_ = substr($this->Db->qstr($this->telefonos_prov_), 1, -1); 
          if ($this->telefonos_prov_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->telefonos_prov_ = "null"; 
              $NM_val_null[] = "telefonos_prov_";
          } 
          $this->email__before_qstr = $this->email_;
          $this->email_ = substr($this->Db->qstr($this->email_), 1, -1); 
          if ($this->email_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->email_ = "null"; 
              $NM_val_null[] = "email_";
          } 
          $this->url__before_qstr = $this->url_;
          $this->url_ = substr($this->Db->qstr($this->url_), 1, -1); 
          if ($this->url_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->url_ = "null"; 
              $NM_val_null[] = "url_";
          } 
          if ($this->creditoprov_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->creditoprov_ = "null"; 
              $NM_val_null[] = "creditoprov_";
          } 
          if ($this->fechultcomp_ == "")  
          { 
              $this->fechultcomp_ = "null"; 
              $NM_val_null[] = "fechultcomp_";
          } 
          if ($this->autoretenedor_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->autoretenedor_ = "null"; 
              $NM_val_null[] = "autoretenedor_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->tipo_documento_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->tipo_documento_ = "null"; 
                  $NM_val_null[] = "tipo_documento_";
              } 
          }
          $this->nombre1__before_qstr = $this->nombre1_;
          $this->nombre1_ = substr($this->Db->qstr($this->nombre1_), 1, -1); 
          if ($this->nombre1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre1_ = "null"; 
              $NM_val_null[] = "nombre1_";
          } 
          $this->nombre2__before_qstr = $this->nombre2_;
          $this->nombre2_ = substr($this->Db->qstr($this->nombre2_), 1, -1); 
          if ($this->nombre2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre2_ = "null"; 
              $NM_val_null[] = "nombre2_";
          } 
          $this->apellido1__before_qstr = $this->apellido1_;
          $this->apellido1_ = substr($this->Db->qstr($this->apellido1_), 1, -1); 
          if ($this->apellido1_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apellido1_ = "null"; 
              $NM_val_null[] = "apellido1_";
          } 
          $this->apellido2__before_qstr = $this->apellido2_;
          $this->apellido2_ = substr($this->Db->qstr($this->apellido2_), 1, -1); 
          if ($this->apellido2_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->apellido2_ = "null"; 
              $NM_val_null[] = "apellido2_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->sucur_cliente_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->sucur_cliente_ = "null"; 
                  $NM_val_null[] = "sucur_cliente_";
              } 
          }
          $this->representante__before_qstr = $this->representante_;
          $this->representante_ = substr($this->Db->qstr($this->representante_), 1, -1); 
          if ($this->representante_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->representante_ = "null"; 
              $NM_val_null[] = "representante_";
          } 
          if ($this->imagenter_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->imagenter_ = "null"; 
              $NM_val_null[] = "imagenter_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->es_restaurante_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->es_restaurante_ = "null"; 
                  $NM_val_null[] = "es_restaurante_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->codigo_ter__before_qstr = $this->codigo_ter_;
          $this->codigo_ter_ = substr($this->Db->qstr($this->codigo_ter_), 1, -1); 
          if ($this->codigo_ter_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_ter_ = "null"; 
              $NM_val_null[] = "codigo_ter_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->es_cajero_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->es_cajero_ = "null"; 
                  $NM_val_null[] = "es_cajero_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->autorizado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->autorizado_ = "null"; 
                  $NM_val_null[] = "autorizado_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->creado_ == "")  
              { 
                  $this->creado_ = "null"; 
                  $NM_val_null[] = "creado_";
              } 
              if ($this->creado_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->creado_ = "null"; 
                  $NM_val_null[] = "creado_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->disponible_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->disponible_ = "null"; 
                  $NM_val_null[] = "disponible_";
              } 
          }
          $this->n_pedido_tmp__before_qstr = $this->n_pedido_tmp_;
          $this->n_pedido_tmp_ = substr($this->Db->qstr($this->n_pedido_tmp_), 1, -1); 
          if ($this->n_pedido_tmp_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->n_pedido_tmp_ = "null"; 
              $NM_val_null[] = "n_pedido_tmp_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
          }
          $this->obs_pedido_tmp__before_qstr = $this->obs_pedido_tmp_;
          $this->obs_pedido_tmp_ = substr($this->Db->qstr($this->obs_pedido_tmp_), 1, -1); 
          if ($this->obs_pedido_tmp_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->obs_pedido_tmp_ = "null"; 
              $NM_val_null[] = "obs_pedido_tmp_";
          } 
          $this->vend_pedido_tmp__before_qstr = $this->vend_pedido_tmp_;
          $this->vend_pedido_tmp_ = substr($this->Db->qstr($this->vend_pedido_tmp_), 1, -1); 
          if ($this->vend_pedido_tmp_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->vend_pedido_tmp_ = "null"; 
              $NM_val_null[] = "vend_pedido_tmp_";
          } 
          $this->ciudad__before_qstr = $this->ciudad_;
          $this->ciudad_ = substr($this->Db->qstr($this->ciudad_), 1, -1); 
          if ($this->ciudad_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->ciudad_ = "null"; 
              $NM_val_null[] = "ciudad_";
          } 
          $this->codigo_postal__before_qstr = $this->codigo_postal_;
          $this->codigo_postal_ = substr($this->Db->qstr($this->codigo_postal_), 1, -1); 
          if ($this->codigo_postal_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_postal_ = "null"; 
              $NM_val_null[] = "codigo_postal_";
          } 
          $this->lenguaje__before_qstr = $this->lenguaje_;
          $this->lenguaje_ = substr($this->Db->qstr($this->lenguaje_), 1, -1); 
          if ($this->lenguaje_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lenguaje_ = "null"; 
              $NM_val_null[] = "lenguaje_";
          } 
          $this->nombre_comercil__before_qstr = $this->nombre_comercil_;
          $this->nombre_comercil_ = substr($this->Db->qstr($this->nombre_comercil_), 1, -1); 
          if ($this->nombre_comercil_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nombre_comercil_ = "null"; 
              $NM_val_null[] = "nombre_comercil_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->notificar_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->notificar_ = "null"; 
                  $NM_val_null[] = "notificar_";
              } 
          }
          $this->puc_auxiliar_deudores__before_qstr = $this->puc_auxiliar_deudores_;
          $this->puc_auxiliar_deudores_ = substr($this->Db->qstr($this->puc_auxiliar_deudores_), 1, -1); 
          if ($this->puc_auxiliar_deudores_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->puc_auxiliar_deudores_ = "null"; 
              $NM_val_null[] = "puc_auxiliar_deudores_";
          } 
          $this->puc_retefuente_ventas__before_qstr = $this->puc_retefuente_ventas_;
          $this->puc_retefuente_ventas_ = substr($this->Db->qstr($this->puc_retefuente_ventas_), 1, -1); 
          if ($this->puc_retefuente_ventas_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->puc_retefuente_ventas_ = "null"; 
              $NM_val_null[] = "puc_retefuente_ventas_";
          } 
          $this->puc_retefuente_servicios_clie__before_qstr = $this->puc_retefuente_servicios_clie_;
          $this->puc_retefuente_servicios_clie_ = substr($this->Db->qstr($this->puc_retefuente_servicios_clie_), 1, -1); 
          if ($this->puc_retefuente_servicios_clie_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->puc_retefuente_servicios_clie_ = "null"; 
              $NM_val_null[] = "puc_retefuente_servicios_clie_";
          } 
          $this->puc_auxiliar_proveedores__before_qstr = $this->puc_auxiliar_proveedores_;
          $this->puc_auxiliar_proveedores_ = substr($this->Db->qstr($this->puc_auxiliar_proveedores_), 1, -1); 
          if ($this->puc_auxiliar_proveedores_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->puc_auxiliar_proveedores_ = "null"; 
              $NM_val_null[] = "puc_auxiliar_proveedores_";
          } 
          $this->puc_retefuente_compras__before_qstr = $this->puc_retefuente_compras_;
          $this->puc_retefuente_compras_ = substr($this->Db->qstr($this->puc_retefuente_compras_), 1, -1); 
          if ($this->puc_retefuente_compras_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->puc_retefuente_compras_ = "null"; 
              $NM_val_null[] = "puc_retefuente_compras_";
          } 
          $this->puc_retefuente_servicios_prov__before_qstr = $this->puc_retefuente_servicios_prov_;
          $this->puc_retefuente_servicios_prov_ = substr($this->Db->qstr($this->puc_retefuente_servicios_prov_), 1, -1); 
          if ($this->puc_retefuente_servicios_prov_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->puc_retefuente_servicios_prov_ = "null"; 
              $NM_val_null[] = "puc_retefuente_servicios_prov_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->nube_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->nube_ = "null"; 
                  $NM_val_null[] = "nube_";
              } 
          }
          $this->latitude__before_qstr = $this->latitude_;
          $this->latitude_ = substr($this->Db->qstr($this->latitude_), 1, -1); 
          if ($this->latitude_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->latitude_ = "null"; 
              $NM_val_null[] = "latitude_";
          } 
          $this->longitude__before_qstr = $this->longitude_;
          $this->longitude_ = substr($this->Db->qstr($this->longitude_), 1, -1); 
          if ($this->longitude_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->longitude_ = "null"; 
              $NM_val_null[] = "longitude_";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->activo_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->activo_ = "null"; 
                  $NM_val_null[] = "activo_";
              } 
          }
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->es_tecnico_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->es_tecnico_ = "null"; 
                  $NM_val_null[] = "es_tecnico_";
              } 
          }
          $this->codigo_tercero__before_qstr = $this->codigo_tercero_;
          $this->codigo_tercero_ = substr($this->Db->qstr($this->codigo_tercero_), 1, -1); 
          if ($this->codigo_tercero_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->codigo_tercero_ = "null"; 
              $NM_val_null[] = "codigo_tercero_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_terceros_contable_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where (documento = '" . $this->documento_ . "') AND (idtercero <> $this->idtercero_)";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
              {
                  $dbErrorMessage = $this->Db->ErrorMsg();
                  $dbErrorCode = $this->Db->ErrorNo();
                  $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) {
                      $this->sc_erro_update = $dbErrorMessage;
                      $this->NM_rollback_db();
                      if ($this->NM_ajax_flag) {
                          form_terceros_contable_pack_ajax_response();
                      }
                      exit;
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_ukey']; 
                  $this->nmgp_opcao = "nada"; 
                  $aUpdateOk[] = 'documento';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', cliente = '$this->cliente_', empleado = '$this->empleado_', proveedor = '$this->proveedor_', puc_auxiliar_deudores = '$this->puc_auxiliar_deudores_', puc_auxiliar_proveedores = '$this->puc_auxiliar_proveedores_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', cliente = '$this->cliente_', empleado = '$this->empleado_', proveedor = '$this->proveedor_', puc_auxiliar_deudores = '$this->puc_auxiliar_deudores_', puc_auxiliar_proveedores = '$this->puc_auxiliar_proveedores_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', cliente = '$this->cliente_', empleado = '$this->empleado_', proveedor = '$this->proveedor_', puc_auxiliar_deudores = '$this->puc_auxiliar_deudores_', puc_auxiliar_proveedores = '$this->puc_auxiliar_proveedores_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', cliente = '$this->cliente_', empleado = '$this->empleado_', proveedor = '$this->proveedor_', puc_auxiliar_deudores = '$this->puc_auxiliar_deudores_', puc_auxiliar_proveedores = '$this->puc_auxiliar_proveedores_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', cliente = '$this->cliente_', empleado = '$this->empleado_', proveedor = '$this->proveedor_', puc_auxiliar_deudores = '$this->puc_auxiliar_deudores_', puc_auxiliar_proveedores = '$this->puc_auxiliar_proveedores_'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', cliente = '$this->cliente_', empleado = '$this->empleado_', proveedor = '$this->proveedor_', puc_auxiliar_deudores = '$this->puc_auxiliar_deudores_', puc_auxiliar_proveedores = '$this->puc_auxiliar_proveedores_'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "documento = '$this->documento_', nombres = '$this->nombres_', cliente = '$this->cliente_', empleado = '$this->empleado_', proveedor = '$this->proveedor_', puc_auxiliar_deudores = '$this->puc_auxiliar_deudores_', puc_auxiliar_proveedores = '$this->puc_auxiliar_proveedores_'"; 
              } 
              if (isset($NM_val_form['direccion_']) && $NM_val_form['direccion_'] != $this->nmgp_dados_select['direccion_']) 
              { 
                  $SC_fields_update[] = "direccion = '$this->direccion_'"; 
              } 
              if (isset($NM_val_form['tel_cel_']) && $NM_val_form['tel_cel_'] != $this->nmgp_dados_select['tel_cel_']) 
              { 
                  $SC_fields_update[] = "tel_cel = '$this->tel_cel_'"; 
              } 
              if (isset($NM_val_form['nacimiento_']) && $NM_val_form['nacimiento_'] != $this->nmgp_dados_select['nacimiento_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "nacimiento = #$this->nacimiento_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "nacimiento = EXTEND('" . $this->nacimiento_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "nacimiento = " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['sexo_']) && $NM_val_form['sexo_'] != $this->nmgp_dados_select['sexo_']) 
              { 
                  $SC_fields_update[] = "sexo = '$this->sexo_'"; 
              } 
              if (isset($NM_val_form['urlmail_']) && $NM_val_form['urlmail_'] != $this->nmgp_dados_select['urlmail_']) 
              { 
                  $SC_fields_update[] = "urlmail = '$this->urlmail_'"; 
              } 
              if (isset($NM_val_form['fechault_']) && $NM_val_form['fechault_'] != $this->nmgp_dados_select['fechault_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechault = #$this->fechault_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fechault = EXTEND('" . $this->fechault_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechault = " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['saldo_']) && $NM_val_form['saldo_'] != $this->nmgp_dados_select['saldo_']) 
              { 
                  $SC_fields_update[] = "saldo = $this->saldo_"; 
              } 
              if (isset($NM_val_form['afiliacion_']) && $NM_val_form['afiliacion_'] != $this->nmgp_dados_select['afiliacion_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "afiliacion = #$this->afiliacion_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "afiliacion = EXTEND('" . $this->afiliacion_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "afiliacion = " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['idmuni_']) && $NM_val_form['idmuni_'] != $this->nmgp_dados_select['idmuni_']) 
              { 
                  $SC_fields_update[] = "idmuni = $this->idmuni_"; 
              } 
              if (isset($NM_val_form['observaciones_']) && $NM_val_form['observaciones_'] != $this->nmgp_dados_select['observaciones_']) 
              { 
                  $SC_fields_update[] = "observaciones = '$this->observaciones_'"; 
              } 
              if (isset($NM_val_form['credito_']) && $NM_val_form['credito_'] != $this->nmgp_dados_select['credito_']) 
              { 
                  $SC_fields_update[] = "credito = '$this->credito_'"; 
              } 
              if (isset($NM_val_form['cupo_']) && $NM_val_form['cupo_'] != $this->nmgp_dados_select['cupo_']) 
              { 
                  $SC_fields_update[] = "cupo = $this->cupo_"; 
              } 
              if (isset($NM_val_form['listaprecios_']) && $NM_val_form['listaprecios_'] != $this->nmgp_dados_select['listaprecios_']) 
              { 
                  $SC_fields_update[] = "listaprecios = $this->listaprecios_"; 
              } 
              if (isset($NM_val_form['loatiende_']) && $NM_val_form['loatiende_'] != $this->nmgp_dados_select['loatiende_']) 
              { 
                  $SC_fields_update[] = "loatiende = $this->loatiende_"; 
              } 
              if (isset($NM_val_form['con_actual_']) && $NM_val_form['con_actual_'] != $this->nmgp_dados_select['con_actual_']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "con_actual = TO_DATE('$this->con_actual_', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "con_actual = '$this->con_actual_'"; 
                  } 
              } 
              if (isset($NM_val_form['efec_retencion_']) && $NM_val_form['efec_retencion_'] != $this->nmgp_dados_select['efec_retencion_']) 
              { 
                  $SC_fields_update[] = "efec_retencion = '$this->efec_retencion_'"; 
              } 
              if (isset($NM_val_form['regimen_']) && $NM_val_form['regimen_'] != $this->nmgp_dados_select['regimen_']) 
              { 
                  $SC_fields_update[] = "regimen = '$this->regimen_'"; 
              } 
              if (isset($NM_val_form['tipo_']) && $NM_val_form['tipo_'] != $this->nmgp_dados_select['tipo_']) 
              { 
                  $SC_fields_update[] = "tipo = '$this->tipo_'"; 
              } 
              if (isset($NM_val_form['contacto_']) && $NM_val_form['contacto_'] != $this->nmgp_dados_select['contacto_']) 
              { 
                  $SC_fields_update[] = "contacto = '$this->contacto_'"; 
              } 
              if (isset($NM_val_form['telefonos_prov_']) && $NM_val_form['telefonos_prov_'] != $this->nmgp_dados_select['telefonos_prov_']) 
              { 
                  $SC_fields_update[] = "telefonos_prov = '$this->telefonos_prov_'"; 
              } 
              if (isset($NM_val_form['email_']) && $NM_val_form['email_'] != $this->nmgp_dados_select['email_']) 
              { 
                  $SC_fields_update[] = "email = '$this->email_'"; 
              } 
              if (isset($NM_val_form['url_']) && $NM_val_form['url_'] != $this->nmgp_dados_select['url_']) 
              { 
                  $SC_fields_update[] = "url = '$this->url_'"; 
              } 
              if (isset($NM_val_form['creditoprov_']) && $NM_val_form['creditoprov_'] != $this->nmgp_dados_select['creditoprov_']) 
              { 
                  $SC_fields_update[] = "creditoprov = '$this->creditoprov_'"; 
              } 
              if (isset($NM_val_form['dias_']) && $NM_val_form['dias_'] != $this->nmgp_dados_select['dias_']) 
              { 
                  $SC_fields_update[] = "dias = $this->dias_"; 
              } 
              if (isset($NM_val_form['fechultcomp_']) && $NM_val_form['fechultcomp_'] != $this->nmgp_dados_select['fechultcomp_']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "fechultcomp = #$this->fechultcomp_#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "fechultcomp = EXTEND('" . $this->fechultcomp_ . "', YEAR TO DAY)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "fechultcomp = " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['saldoapagar_']) && $NM_val_form['saldoapagar_'] != $this->nmgp_dados_select['saldoapagar_']) 
              { 
                  $SC_fields_update[] = "saldoapagar = $this->saldoapagar_"; 
              } 
              if (isset($NM_val_form['autoretenedor_']) && $NM_val_form['autoretenedor_'] != $this->nmgp_dados_select['autoretenedor_']) 
              { 
                  $SC_fields_update[] = "autoretenedor = '$this->autoretenedor_'"; 
              } 
              if (isset($NM_val_form['tipo_documento_']) && $NM_val_form['tipo_documento_'] != $this->nmgp_dados_select['tipo_documento_']) 
              { 
                  $SC_fields_update[] = "tipo_documento = '$this->tipo_documento_'"; 
              } 
              if (isset($NM_val_form['dv_']) && $NM_val_form['dv_'] != $this->nmgp_dados_select['dv_']) 
              { 
                  $SC_fields_update[] = "dv = $this->dv_"; 
              } 
              if (isset($NM_val_form['nombre1_']) && $NM_val_form['nombre1_'] != $this->nmgp_dados_select['nombre1_']) 
              { 
                  $SC_fields_update[] = "nombre1 = '$this->nombre1_'"; 
              } 
              if (isset($NM_val_form['nombre2_']) && $NM_val_form['nombre2_'] != $this->nmgp_dados_select['nombre2_']) 
              { 
                  $SC_fields_update[] = "nombre2 = '$this->nombre2_'"; 
              } 
              if (isset($NM_val_form['apellido1_']) && $NM_val_form['apellido1_'] != $this->nmgp_dados_select['apellido1_']) 
              { 
                  $SC_fields_update[] = "apellido1 = '$this->apellido1_'"; 
              } 
              if (isset($NM_val_form['apellido2_']) && $NM_val_form['apellido2_'] != $this->nmgp_dados_select['apellido2_']) 
              { 
                  $SC_fields_update[] = "apellido2 = '$this->apellido2_'"; 
              } 
              if (isset($NM_val_form['sucur_cliente_']) && $NM_val_form['sucur_cliente_'] != $this->nmgp_dados_select['sucur_cliente_']) 
              { 
                  $SC_fields_update[] = "sucur_cliente = '$this->sucur_cliente_'"; 
              } 
              if (isset($NM_val_form['representante_']) && $NM_val_form['representante_'] != $this->nmgp_dados_select['representante_']) 
              { 
                  $SC_fields_update[] = "representante = '$this->representante_'"; 
              } 
              if (isset($NM_val_form['es_restaurante_']) && $NM_val_form['es_restaurante_'] != $this->nmgp_dados_select['es_restaurante_']) 
              { 
                  $SC_fields_update[] = "es_restaurante = '$this->es_restaurante_'"; 
              } 
              if (isset($NM_val_form['dias_credito_']) && $NM_val_form['dias_credito_'] != $this->nmgp_dados_select['dias_credito_']) 
              { 
                  $SC_fields_update[] = "dias_credito = $this->dias_credito_"; 
              } 
              if (isset($NM_val_form['dias_mora_']) && $NM_val_form['dias_mora_'] != $this->nmgp_dados_select['dias_mora_']) 
              { 
                  $SC_fields_update[] = "dias_mora = $this->dias_mora_"; 
              } 
              if (isset($NM_val_form['cupo_vendedor_']) && $NM_val_form['cupo_vendedor_'] != $this->nmgp_dados_select['cupo_vendedor_']) 
              { 
                  $SC_fields_update[] = "cupo_vendedor = $this->cupo_vendedor_"; 
              } 
              if (isset($NM_val_form['codigo_ter_']) && $NM_val_form['codigo_ter_'] != $this->nmgp_dados_select['codigo_ter_']) 
              { 
                  $SC_fields_update[] = "codigo_ter = '$this->codigo_ter_'"; 
              } 
              if (isset($NM_val_form['es_cajero_']) && $NM_val_form['es_cajero_'] != $this->nmgp_dados_select['es_cajero_']) 
              { 
                  $SC_fields_update[] = "es_cajero = '$this->es_cajero_'"; 
              } 
              if (isset($NM_val_form['autorizado_']) && $NM_val_form['autorizado_'] != $this->nmgp_dados_select['autorizado_']) 
              { 
                  $SC_fields_update[] = "autorizado = '$this->autorizado_'"; 
              } 
              if (isset($NM_val_form['zona_clientes_']) && $NM_val_form['zona_clientes_'] != $this->nmgp_dados_select['zona_clientes_']) 
              { 
                  $SC_fields_update[] = "zona_clientes = $this->zona_clientes_"; 
              } 
              if (isset($NM_val_form['clasificacion_clientes_']) && $NM_val_form['clasificacion_clientes_'] != $this->nmgp_dados_select['clasificacion_clientes_']) 
              { 
                  $SC_fields_update[] = "clasificacion_clientes = $this->clasificacion_clientes_"; 
              } 
              if (isset($NM_val_form['creado_']) && $NM_val_form['creado_'] != $this->nmgp_dados_select['creado_']) 
              { 
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $SC_fields_update[] = "creado = TO_DATE('$this->creado_', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "creado = '$this->creado_'"; 
                  } 
              } 
              if (isset($NM_val_form['disponible_']) && $NM_val_form['disponible_'] != $this->nmgp_dados_select['disponible_']) 
              { 
                  $SC_fields_update[] = "disponible = '$this->disponible_'"; 
              } 
              if (isset($NM_val_form['id_pedido_tmp_']) && $NM_val_form['id_pedido_tmp_'] != $this->nmgp_dados_select['id_pedido_tmp_']) 
              { 
                  $SC_fields_update[] = "id_pedido_tmp = $this->id_pedido_tmp_"; 
              } 
              if (isset($NM_val_form['n_pedido_tmp_']) && $NM_val_form['n_pedido_tmp_'] != $this->nmgp_dados_select['n_pedido_tmp_']) 
              { 
                  $SC_fields_update[] = "n_pedido_tmp = '$this->n_pedido_tmp_'"; 
              } 
              if (isset($NM_val_form['total_pedido_tmp_']) && $NM_val_form['total_pedido_tmp_'] != $this->nmgp_dados_select['total_pedido_tmp_']) 
              { 
                  $SC_fields_update[] = "total_pedido_tmp = $this->total_pedido_tmp_"; 
              } 
              if (isset($NM_val_form['obs_pedido_tmp_']) && $NM_val_form['obs_pedido_tmp_'] != $this->nmgp_dados_select['obs_pedido_tmp_']) 
              { 
                  $SC_fields_update[] = "obs_pedido_tmp = '$this->obs_pedido_tmp_'"; 
              } 
              if (isset($NM_val_form['vend_pedido_tmp_']) && $NM_val_form['vend_pedido_tmp_'] != $this->nmgp_dados_select['vend_pedido_tmp_']) 
              { 
                  $SC_fields_update[] = "vend_pedido_tmp = '$this->vend_pedido_tmp_'"; 
              } 
              if (isset($NM_val_form['ciudad_']) && $NM_val_form['ciudad_'] != $this->nmgp_dados_select['ciudad_']) 
              { 
                  $SC_fields_update[] = "ciudad = '$this->ciudad_'"; 
              } 
              if (isset($NM_val_form['codigo_postal_']) && $NM_val_form['codigo_postal_'] != $this->nmgp_dados_select['codigo_postal_']) 
              { 
                  $SC_fields_update[] = "codigo_postal = '$this->codigo_postal_'"; 
              } 
              if (isset($NM_val_form['lenguaje_']) && $NM_val_form['lenguaje_'] != $this->nmgp_dados_select['lenguaje_']) 
              { 
                  $SC_fields_update[] = "lenguaje = '$this->lenguaje_'"; 
              } 
              if (isset($NM_val_form['nombre_comercil_']) && $NM_val_form['nombre_comercil_'] != $this->nmgp_dados_select['nombre_comercil_']) 
              { 
                  $SC_fields_update[] = "nombre_comercil = '$this->nombre_comercil_'"; 
              } 
              if (isset($NM_val_form['notificar_']) && $NM_val_form['notificar_'] != $this->nmgp_dados_select['notificar_']) 
              { 
                  $SC_fields_update[] = "notificar = '$this->notificar_'"; 
              } 
              if (isset($NM_val_form['puc_retefuente_ventas_']) && $NM_val_form['puc_retefuente_ventas_'] != $this->nmgp_dados_select['puc_retefuente_ventas_']) 
              { 
                  $SC_fields_update[] = "puc_retefuente_ventas = '$this->puc_retefuente_ventas_'"; 
              } 
              if (isset($NM_val_form['puc_retefuente_servicios_clie_']) && $NM_val_form['puc_retefuente_servicios_clie_'] != $this->nmgp_dados_select['puc_retefuente_servicios_clie_']) 
              { 
                  $SC_fields_update[] = "puc_retefuente_servicios_clie = '$this->puc_retefuente_servicios_clie_'"; 
              } 
              if (isset($NM_val_form['puc_retefuente_compras_']) && $NM_val_form['puc_retefuente_compras_'] != $this->nmgp_dados_select['puc_retefuente_compras_']) 
              { 
                  $SC_fields_update[] = "puc_retefuente_compras = '$this->puc_retefuente_compras_'"; 
              } 
              if (isset($NM_val_form['puc_retefuente_servicios_prov_']) && $NM_val_form['puc_retefuente_servicios_prov_'] != $this->nmgp_dados_select['puc_retefuente_servicios_prov_']) 
              { 
                  $SC_fields_update[] = "puc_retefuente_servicios_prov = '$this->puc_retefuente_servicios_prov_'"; 
              } 
              if (isset($NM_val_form['nube_']) && $NM_val_form['nube_'] != $this->nmgp_dados_select['nube_']) 
              { 
                  $SC_fields_update[] = "nube = '$this->nube_'"; 
              } 
              if (isset($NM_val_form['latitude_']) && $NM_val_form['latitude_'] != $this->nmgp_dados_select['latitude_']) 
              { 
                  $SC_fields_update[] = "latitude = '$this->latitude_'"; 
              } 
              if (isset($NM_val_form['longitude_']) && $NM_val_form['longitude_'] != $this->nmgp_dados_select['longitude_']) 
              { 
                  $SC_fields_update[] = "longitude = '$this->longitude_'"; 
              } 
              if (isset($NM_val_form['activo_']) && $NM_val_form['activo_'] != $this->nmgp_dados_select['activo_']) 
              { 
                  $SC_fields_update[] = "activo = '$this->activo_'"; 
              } 
              if (isset($NM_val_form['es_tecnico_']) && $NM_val_form['es_tecnico_'] != $this->nmgp_dados_select['es_tecnico_']) 
              { 
                  $SC_fields_update[] = "es_tecnico = '$this->es_tecnico_'"; 
              } 
              if (isset($NM_val_form['codigo_tercero_']) && $NM_val_form['codigo_tercero_'] != $this->nmgp_dados_select['codigo_tercero_']) 
              { 
                  $SC_fields_update[] = "codigo_tercero = '$this->codigo_tercero_'"; 
              } 
              if (isset($NM_val_form['porcentaje_propina_sugerida_']) && $NM_val_form['porcentaje_propina_sugerida_'] != $this->nmgp_dados_select['porcentaje_propina_sugerida_']) 
              { 
                  $SC_fields_update[] = "porcentaje_propina_sugerida = $this->porcentaje_propina_sugerida_"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
              }  
              else  
              {
                  $comando .= " WHERE idtercero = $this->idtercero_ ";  
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
                                  form_terceros_contable_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->documento_ = $this->documento__before_qstr;
              $this->nombres_ = $this->nombres__before_qstr;
              $this->direccion_ = $this->direccion__before_qstr;
              $this->tel_cel_ = $this->tel_cel__before_qstr;
              $this->urlmail_ = $this->urlmail__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->credito_ = $this->credito__before_qstr;
              $this->contacto_ = $this->contacto__before_qstr;
              $this->telefonos_prov_ = $this->telefonos_prov__before_qstr;
              $this->email_ = $this->email__before_qstr;
              $this->url_ = $this->url__before_qstr;
              $this->nombre1_ = $this->nombre1__before_qstr;
              $this->nombre2_ = $this->nombre2__before_qstr;
              $this->apellido1_ = $this->apellido1__before_qstr;
              $this->apellido2_ = $this->apellido2__before_qstr;
              $this->representante_ = $this->representante__before_qstr;
              $this->codigo_ter_ = $this->codigo_ter__before_qstr;
              $this->n_pedido_tmp_ = $this->n_pedido_tmp__before_qstr;
              $this->obs_pedido_tmp_ = $this->obs_pedido_tmp__before_qstr;
              $this->vend_pedido_tmp_ = $this->vend_pedido_tmp__before_qstr;
              $this->ciudad_ = $this->ciudad__before_qstr;
              $this->codigo_postal_ = $this->codigo_postal__before_qstr;
              $this->lenguaje_ = $this->lenguaje__before_qstr;
              $this->nombre_comercil_ = $this->nombre_comercil__before_qstr;
              $this->puc_auxiliar_deudores_ = $this->puc_auxiliar_deudores__before_qstr;
              $this->puc_retefuente_ventas_ = $this->puc_retefuente_ventas__before_qstr;
              $this->puc_retefuente_servicios_clie_ = $this->puc_retefuente_servicios_clie__before_qstr;
              $this->puc_auxiliar_proveedores_ = $this->puc_auxiliar_proveedores__before_qstr;
              $this->puc_retefuente_compras_ = $this->puc_retefuente_compras__before_qstr;
              $this->puc_retefuente_servicios_prov_ = $this->puc_retefuente_servicios_prov__before_qstr;
              $this->latitude_ = $this->latitude__before_qstr;
              $this->longitude_ = $this->longitude__before_qstr;
              $this->codigo_tercero_ = $this->codigo_tercero__before_qstr;
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

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['documento_'])) { $this->documento_ = $NM_val_form['documento_']; }
              elseif (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nombres_'])) { $this->nombres_ = $NM_val_form['nombres_']; }
              elseif (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
              if     (isset($NM_val_form) && isset($NM_val_form['puc_auxiliar_deudores_'])) { $this->puc_auxiliar_deudores_ = $NM_val_form['puc_auxiliar_deudores_']; }
              elseif (isset($this->puc_auxiliar_deudores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_deudores_); }
              if     (isset($NM_val_form) && isset($NM_val_form['puc_auxiliar_proveedores_'])) { $this->puc_auxiliar_proveedores_ = $NM_val_form['puc_auxiliar_proveedores_']; }
              elseif (isset($this->puc_auxiliar_proveedores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_proveedores_); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('documento_', 'nombres_', 'cliente_', 'empleado_', 'proveedor_', 'puc_auxiliar_proveedores_', 'puc_auxiliar_deudores_'), $aDoNotUpdate);
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['empleado_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['proveedor_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "idtercero, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
              $Cmd_Unique = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where documento = '" . $this->documento_ . "'";
              $Cmd_Unique = str_replace("'null'", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace("#null#", "null", $Cmd_Unique) ; 
              $Cmd_Unique = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $Cmd_Unique) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $Cmd_Unique;
              $rsUni = $this->Db->Execute($Cmd_Unique);
              if (false === $rsUni)
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
                          form_terceros_contable_pack_ajax_response();
                          exit;
                      }
                  }
              }
              elseif (0 < $rsUni->fields[0])
              {
                  $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_inst_uniq'] . " Documento"; 
                  $this->nmgp_opcao = "nada"; 
                  $GLOBALS["erro_incl"] = 1; 
                  $aInsertOk[] = 'documento';
                  $rsUni->Close();
              }
              else
              {
                  $rsUni->Close();
              }
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->imagenter__scfile_name, $dir_file, "imagenter_");
              if (trim($this->imagenter__scfile_name) != $_test_file)
              {
                  $this->imagenter__scfile_name = $_test_file;
                  $this->imagenter_ = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES ('$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', #$this->nacimiento_#, '$this->urlmail_', #$this->fechault_#, $this->saldo_, #$this->afiliacion_#, $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, #$this->fechultcomp_#, $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '$this->imagenter_', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco == "pdo_sqlsrv")
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES ('$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES ('$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '$this->imagenter_', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES ('$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '$this->imagenter_', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", TO_DATE('$this->con_actual_', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", TO_DATE('$this->creado_', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES (" . $NM_seq_auto . "'$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', EMPTY_BLOB(), $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES (" . $NM_seq_auto . "'$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', EXTEND('$this->nacimiento_', YEAR TO DAY), '$this->urlmail_', EXTEND('$this->fechault_', YEAR TO DAY), $this->saldo_, EXTEND('$this->afiliacion_', YEAR TO DAY), $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, EXTEND('$this->fechultcomp_', YEAR TO DAY), $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', null, $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES (" . $NM_seq_auto . "'$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES (" . $NM_seq_auto . "'$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES (" . $NM_seq_auto . "'$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              elseif ($this->Ini->nm_tpbanco =='pdo_ibm')
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", TO_DATE('$this->con_actual_', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", TO_DATE('$this->creado_', 'yyyy-mm-dd hh24:mi:ss')";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES (" . $NM_seq_auto . "'$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', EMPTY_BLOB(), $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->sexo_ != "")
                  { 
                       $compl_insert     .= ", sexo";
                       $compl_insert_val .= ", '$this->sexo_'";
                  } 
                  if ($this->credito_ != "")
                  { 
                       $compl_insert     .= ", credito";
                       $compl_insert_val .= ", '$this->credito_'";
                  } 
                  if ($this->listaprecios_ != "")
                  { 
                       $compl_insert     .= ", listaprecios";
                       $compl_insert_val .= ", $this->listaprecios_";
                  } 
                  if ($this->con_actual_ != "")
                  { 
                       $compl_insert     .= ", con_actual";
                       $compl_insert_val .= ", '$this->con_actual_'";
                  } 
                  if ($this->tipo_ != "")
                  { 
                       $compl_insert     .= ", tipo";
                       $compl_insert_val .= ", '$this->tipo_'";
                  } 
                  if ($this->tipo_documento_ != "")
                  { 
                       $compl_insert     .= ", tipo_documento";
                       $compl_insert_val .= ", '$this->tipo_documento_'";
                  } 
                  if ($this->sucur_cliente_ != "")
                  { 
                       $compl_insert     .= ", sucur_cliente";
                       $compl_insert_val .= ", '$this->sucur_cliente_'";
                  } 
                  if ($this->es_restaurante_ != "")
                  { 
                       $compl_insert     .= ", es_restaurante";
                       $compl_insert_val .= ", '$this->es_restaurante_'";
                  } 
                  if ($this->cupo_vendedor_ != "")
                  { 
                       $compl_insert     .= ", cupo_vendedor";
                       $compl_insert_val .= ", $this->cupo_vendedor_";
                  } 
                  if ($this->es_cajero_ != "")
                  { 
                       $compl_insert     .= ", es_cajero";
                       $compl_insert_val .= ", '$this->es_cajero_'";
                  } 
                  if ($this->autorizado_ != "")
                  { 
                       $compl_insert     .= ", autorizado";
                       $compl_insert_val .= ", '$this->autorizado_'";
                  } 
                  if ($this->creado_ != "")
                  { 
                       $compl_insert     .= ", creado";
                       $compl_insert_val .= ", '$this->creado_'";
                  } 
                  if ($this->disponible_ != "")
                  { 
                       $compl_insert     .= ", disponible";
                       $compl_insert_val .= ", '$this->disponible_'";
                  } 
                  if ($this->total_pedido_tmp_ != "")
                  { 
                       $compl_insert     .= ", total_pedido_tmp";
                       $compl_insert_val .= ", $this->total_pedido_tmp_";
                  } 
                  if ($this->notificar_ != "")
                  { 
                       $compl_insert     .= ", notificar";
                       $compl_insert_val .= ", '$this->notificar_'";
                  } 
                  if ($this->nube_ != "")
                  { 
                       $compl_insert     .= ", nube";
                       $compl_insert_val .= ", '$this->nube_'";
                  } 
                  if ($this->activo_ != "")
                  { 
                       $compl_insert     .= ", activo";
                       $compl_insert_val .= ", '$this->activo_'";
                  } 
                  if ($this->es_tecnico_ != "")
                  { 
                       $compl_insert     .= ", es_tecnico";
                       $compl_insert_val .= ", '$this->es_tecnico_'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "documento, nombres, direccion, tel_cel, nacimiento, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, cupo, loatiende, efec_retencion, regimen, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, dv, nombre1, nombre2, apellido1, apellido2, representante, imagenter, dias_credito, dias_mora, codigo_ter, zona_clientes, clasificacion_clientes, id_pedido_tmp, n_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, latitude, longitude, codigo_tercero, porcentaje_propina_sugerida $compl_insert) VALUES (" . $NM_seq_auto . "'$this->documento_', '$this->nombres_', '$this->direccion_', '$this->tel_cel_', " . $this->Ini->date_delim . $this->nacimiento_ . $this->Ini->date_delim1 . ", '$this->urlmail_', " . $this->Ini->date_delim . $this->fechault_ . $this->Ini->date_delim1 . ", $this->saldo_, " . $this->Ini->date_delim . $this->afiliacion_ . $this->Ini->date_delim1 . ", $this->idmuni_, '$this->observaciones_', $this->cupo_, $this->loatiende_, '$this->efec_retencion_', '$this->regimen_', '$this->cliente_', '$this->empleado_', '$this->proveedor_', '$this->contacto_', '$this->telefonos_prov_', '$this->email_', '$this->url_', '$this->creditoprov_', $this->dias_, " . $this->Ini->date_delim . $this->fechultcomp_ . $this->Ini->date_delim1 . ", $this->saldoapagar_, '$this->autoretenedor_', $this->dv_, '$this->nombre1_', '$this->nombre2_', '$this->apellido1_', '$this->apellido2_', '$this->representante_', '$this->imagenter_', $this->dias_credito_, $this->dias_mora_, '$this->codigo_ter_', $this->zona_clientes_, $this->clasificacion_clientes_, $this->id_pedido_tmp_, '$this->n_pedido_tmp_', '$this->obs_pedido_tmp_', '$this->vend_pedido_tmp_', '$this->ciudad_', '$this->codigo_postal_', '$this->lenguaje_', '$this->nombre_comercil_', '$this->puc_auxiliar_deudores_', '$this->puc_retefuente_ventas_', '$this->puc_retefuente_servicios_clie_', '$this->puc_auxiliar_proveedores_', '$this->puc_retefuente_compras_', '$this->puc_retefuente_servicios_prov_', '$this->latitude_', '$this->longitude_', '$this->codigo_tercero_', $this->porcentaje_propina_sugerida_ $compl_insert_val)"; 
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
                              form_terceros_contable_pack_ajax_response();
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
                          form_terceros_contable_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->idtercero_ =  $rsy->fields[0];
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
                  $this->idtercero_ = $rsy->fields[0];
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
                  $this->idtercero_ = $rsy->fields[0];
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
                  $this->idtercero_ = $rsy->fields[0];
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
                  $this->idtercero_ = $rsy->fields[0];
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
                  $this->idtercero_ = $rsy->fields[0];
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
                  $this->idtercero_ = $rsy->fields[0];
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
                  $this->idtercero_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->documento_ = $this->documento__before_qstr;
              $this->nombres_ = $this->nombres__before_qstr;
              $this->direccion_ = $this->direccion__before_qstr;
              $this->tel_cel_ = $this->tel_cel__before_qstr;
              $this->urlmail_ = $this->urlmail__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->credito_ = $this->credito__before_qstr;
              $this->contacto_ = $this->contacto__before_qstr;
              $this->telefonos_prov_ = $this->telefonos_prov__before_qstr;
              $this->email_ = $this->email__before_qstr;
              $this->url_ = $this->url__before_qstr;
              $this->nombre1_ = $this->nombre1__before_qstr;
              $this->nombre2_ = $this->nombre2__before_qstr;
              $this->apellido1_ = $this->apellido1__before_qstr;
              $this->apellido2_ = $this->apellido2__before_qstr;
              $this->representante_ = $this->representante__before_qstr;
              $this->codigo_ter_ = $this->codigo_ter__before_qstr;
              $this->n_pedido_tmp_ = $this->n_pedido_tmp__before_qstr;
              $this->obs_pedido_tmp_ = $this->obs_pedido_tmp__before_qstr;
              $this->vend_pedido_tmp_ = $this->vend_pedido_tmp__before_qstr;
              $this->ciudad_ = $this->ciudad__before_qstr;
              $this->codigo_postal_ = $this->codigo_postal__before_qstr;
              $this->lenguaje_ = $this->lenguaje__before_qstr;
              $this->nombre_comercil_ = $this->nombre_comercil__before_qstr;
              $this->puc_auxiliar_deudores_ = $this->puc_auxiliar_deudores__before_qstr;
              $this->puc_retefuente_ventas_ = $this->puc_retefuente_ventas__before_qstr;
              $this->puc_retefuente_servicios_clie_ = $this->puc_retefuente_servicios_clie__before_qstr;
              $this->puc_auxiliar_proveedores_ = $this->puc_auxiliar_proveedores__before_qstr;
              $this->puc_retefuente_compras_ = $this->puc_retefuente_compras__before_qstr;
              $this->puc_retefuente_servicios_prov_ = $this->puc_retefuente_servicios_prov__before_qstr;
              $this->latitude_ = $this->latitude__before_qstr;
              $this->longitude_ = $this->longitude__before_qstr;
              $this->codigo_tercero_ = $this->codigo_tercero__before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->imagenter_ ) != "") 
                  { 
                      $_SESSION['scriptcase']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  imagenter , $this->imagenter_,  \"idtercero = $this->idtercero_\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "imagenter", $this->imagenter_,  "idtercero = $this->idtercero_"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_terceros_contable_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $this->documento_ = $this->documento__before_qstr;
              $this->nombres_ = $this->nombres__before_qstr;
              $this->direccion_ = $this->direccion__before_qstr;
              $this->tel_cel_ = $this->tel_cel__before_qstr;
              $this->urlmail_ = $this->urlmail__before_qstr;
              $this->observaciones_ = $this->observaciones__before_qstr;
              $this->credito_ = $this->credito__before_qstr;
              $this->contacto_ = $this->contacto__before_qstr;
              $this->telefonos_prov_ = $this->telefonos_prov__before_qstr;
              $this->email_ = $this->email__before_qstr;
              $this->url_ = $this->url__before_qstr;
              $this->nombre1_ = $this->nombre1__before_qstr;
              $this->nombre2_ = $this->nombre2__before_qstr;
              $this->apellido1_ = $this->apellido1__before_qstr;
              $this->apellido2_ = $this->apellido2__before_qstr;
              $this->representante_ = $this->representante__before_qstr;
              $this->codigo_ter_ = $this->codigo_ter__before_qstr;
              $this->n_pedido_tmp_ = $this->n_pedido_tmp__before_qstr;
              $this->obs_pedido_tmp_ = $this->obs_pedido_tmp__before_qstr;
              $this->vend_pedido_tmp_ = $this->vend_pedido_tmp__before_qstr;
              $this->ciudad_ = $this->ciudad__before_qstr;
              $this->codigo_postal_ = $this->codigo_postal__before_qstr;
              $this->lenguaje_ = $this->lenguaje__before_qstr;
              $this->nombre_comercil_ = $this->nombre_comercil__before_qstr;
              $this->puc_auxiliar_deudores_ = $this->puc_auxiliar_deudores__before_qstr;
              $this->puc_retefuente_ventas_ = $this->puc_retefuente_ventas__before_qstr;
              $this->puc_retefuente_servicios_clie_ = $this->puc_retefuente_servicios_clie__before_qstr;
              $this->puc_auxiliar_proveedores_ = $this->puc_auxiliar_proveedores__before_qstr;
              $this->puc_retefuente_compras_ = $this->puc_retefuente_compras__before_qstr;
              $this->puc_retefuente_servicios_prov_ = $this->puc_retefuente_servicios_prov__before_qstr;
              $this->latitude_ = $this->latitude__before_qstr;
              $this->longitude_ = $this->longitude__before_qstr;
              $this->codigo_tercero_ = $this->codigo_tercero__before_qstr;
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['documento_'] = $this->documento_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['nombres_'] = $this->nombres_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['cliente_'] = $this->cliente_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['empleado_'] = $this->empleado_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['proveedor_'] = $this->proveedor_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['puc_auxiliar_proveedores_'] = $this->puc_auxiliar_proveedores_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert]['puc_auxiliar_deudores_'] = $this->puc_auxiliar_deudores_;
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
              if (isset($this->documento_)) { $this->nm_limpa_alfa($this->documento_); }
              if (isset($this->nombres_)) { $this->nm_limpa_alfa($this->nombres_); }
              if (isset($this->puc_auxiliar_deudores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_deudores_); }
              if (isset($this->puc_auxiliar_proveedores_)) { $this->nm_limpa_alfa($this->puc_auxiliar_proveedores_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_formatar_campos();

                  $tmpLabel_documento_ = $this->documento_;
                  $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->documento_)));
                  $this->NM_ajax_info['fldList']['documento_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_documento_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['documento_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_nombres_ = $this->nombres_;
                  $this->NM_ajax_info['fldList']['nombres_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['nombres_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->nombres_)));
                  $this->NM_ajax_info['fldList']['nombres_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_nombres_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nombres_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_cliente_ = $this->cliente_;
                  $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->cliente_)));
                  $this->NM_ajax_info['fldList']['cliente_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_cliente_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['cliente_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_empleado_ = $this->empleado_;
                  $this->NM_ajax_info['fldList']['empleado_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['empleado_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->empleado_)));
                  $this->NM_ajax_info['fldList']['empleado_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_empleado_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['empleado_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['empleado_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['empleado_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['empleado_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $tmpLabel_proveedor_ = $this->proveedor_;
                  $this->NM_ajax_info['fldList']['proveedor_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['proveedor_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->proveedor_)));
                  $this->NM_ajax_info['fldList']['proveedor_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input(NM_charset_to_utf8($tmpLabel_proveedor_)));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['proveedor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['proveedor_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['proveedor_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['proveedor_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre)  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_terceros_contable_pack_protect_string(NM_charset_to_utf8($this->puc_auxiliar_proveedores_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_puc_auxiliar_proveedores_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->puc_auxiliar_proveedores_)));
                  $this->NM_ajax_info['fldList']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_puc_auxiliar_proveedores_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['puc_auxiliar_proveedores_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre)  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_terceros_contable_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_terceros_contable_pack_protect_string(NM_charset_to_utf8($this->puc_auxiliar_deudores_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_puc_auxiliar_deudores_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input(NM_charset_to_utf8($this->puc_auxiliar_deudores_)));
                  $this->NM_ajax_info['fldList']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_puc_auxiliar_deudores_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['puc_auxiliar_deudores_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->idtercero_ = substr($this->Db->qstr($this->idtercero_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
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
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where idtercero = $this->idtercero_ "); 
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
                          form_terceros_contable_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['db_changed'] = true;

              $this->sc_teve_excl = true; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['parms'] = "idtercero_?#?$this->idtercero_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->idtercero_ = null === $this->idtercero_ ? null : substr($this->Db->qstr($this->idtercero_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['rows']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['rows']))
      {
          $this->sc_max_reg = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['rows'];
      } 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['rows_ins']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['scriptcase']['sc_apl_conf']['form_terceros_contable']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_max_reg'];
      } 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_terceros_contable = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter'] . ")";
          }
      }
      $sc_where = "";
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->idtercero_)
          {
              $aNewWhereCond[] = "idtercero = " . $this->idtercero_;
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total']))
          {
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_terceros_contable = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total'] = $qt_geral_reg_form_terceros_contable;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total']) || $this->sc_teve_excl || $this->sc_teve_incl)
      { 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->idtercero_))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "idtercero < $this->idtercero_ "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "idtercero < $this->idtercero_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "idtercero < $this->idtercero_ "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "idtercero < $this->idtercero_ "; 
              }
              else  
              {
                  $Key_Where = "idtercero < $this->idtercero_ "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_terceros_contable = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_terceros_contable) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] += $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] > $qt_geral_reg_form_terceros_contable)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = $qt_geral_reg_form_terceros_contable - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = ($qt_geral_reg_form_terceros_contable + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] = 0; 
          }
      } 
      }
      $Cmps_ord_def = array();
      $sc_order_by  = "";
      $sc_order_by = "idtercero";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, str_replace (convert(char(10),nacimiento,102), '.', '-') + ' ' + convert(char(8),nacimiento,20), sexo, urlmail, str_replace (convert(char(10),fechault,102), '.', '-') + ' ' + convert(char(8),fechault,20), saldo, str_replace (convert(char(10),afiliacion,102), '.', '-') + ' ' + convert(char(8),afiliacion,20), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, str_replace (convert(char(10),fechultcomp,102), '.', '-') + ' ' + convert(char(8),fechultcomp,20), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, latitude, longitude, activo, es_tecnico, codigo_tercero, porcentaje_propina_sugerida from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, convert(char(23),nacimiento,121), sexo, urlmail, convert(char(23),fechault,121), saldo, convert(char(23),afiliacion,121), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, convert(char(23),fechultcomp,121), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, latitude, longitude, activo, es_tecnico, codigo_tercero, porcentaje_propina_sugerida from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, TO_DATE(TO_CHAR(con_actual, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, TO_DATE(TO_CHAR(creado, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, latitude, longitude, activo, es_tecnico, codigo_tercero, porcentaje_propina_sugerida from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, EXTEND(nacimiento, YEAR TO DAY), sexo, urlmail, EXTEND(fechault, YEAR TO DAY), saldo, EXTEND(afiliacion, YEAR TO DAY), idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, EXTEND(fechultcomp, YEAR TO DAY), saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, LOTOFILE(imagenter, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_imagenter', 'client'), es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, latitude, longitude, activo, es_tecnico, codigo_tercero, porcentaje_propina_sugerida from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT idtercero, documento, nombres, direccion, tel_cel, nacimiento, sexo, urlmail, fechault, saldo, afiliacion, idmuni, observaciones, credito, cupo, listaprecios, loatiende, con_actual, efec_retencion, regimen, tipo, cliente, empleado, proveedor, contacto, telefonos_prov, email, url, creditoprov, dias, fechultcomp, saldoapagar, autoretenedor, tipo_documento, dv, nombre1, nombre2, apellido1, apellido2, sucur_cliente, representante, imagenter, es_restaurante, dias_credito, dias_mora, cupo_vendedor, codigo_ter, es_cajero, autorizado, zona_clientes, clasificacion_clientes, creado, disponible, id_pedido_tmp, n_pedido_tmp, total_pedido_tmp, obs_pedido_tmp, vend_pedido_tmp, ciudad, codigo_postal, lenguaje, nombre_comercil, notificar, puc_auxiliar_deudores, puc_retefuente_ventas, puc_retefuente_servicios_clie, puc_auxiliar_proveedores, puc_retefuente_compras, puc_retefuente_servicios_prov, nube, latitude, longitude, activo, es_tecnico, codigo_tercero, porcentaje_propina_sugerida from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "R")
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start']) ;  
                  } 
              } 
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
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on" && !$this->proc_fast_search)
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->idtercero_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['idtercero_'] = $this->idtercero_;
              $this->documento_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['documento_'] = $this->documento_;
              $this->nombres_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['nombres_'] = $this->nombres_;
              $this->direccion_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['direccion_'] = $this->direccion_;
              $this->tel_cel_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['tel_cel_'] = $this->tel_cel_;
              $this->nacimiento_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['nacimiento_'] = $this->nacimiento_;
              $this->sexo_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['sexo_'] = $this->sexo_;
              $this->urlmail_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['urlmail_'] = $this->urlmail_;
              $this->fechault_ = $rs->fields[8] ; 
              $this->nmgp_dados_select['fechault_'] = $this->fechault_;
              $this->saldo_ = $rs->fields[9] ; 
              $this->nmgp_dados_select['saldo_'] = $this->saldo_;
              $this->afiliacion_ = $rs->fields[10] ; 
              $this->nmgp_dados_select['afiliacion_'] = $this->afiliacion_;
              $this->idmuni_ = $rs->fields[11] ; 
              $this->nmgp_dados_select['idmuni_'] = $this->idmuni_;
              $this->observaciones_ = $rs->fields[12] ; 
              $this->nmgp_dados_select['observaciones_'] = $this->observaciones_;
              $this->credito_ = $rs->fields[13] ; 
              $this->nmgp_dados_select['credito_'] = $this->credito_;
              $this->cupo_ = $rs->fields[14] ; 
              $this->nmgp_dados_select['cupo_'] = $this->cupo_;
              $this->listaprecios_ = $rs->fields[15] ; 
              $this->nmgp_dados_select['listaprecios_'] = $this->listaprecios_;
              $this->loatiende_ = $rs->fields[16] ; 
              $this->nmgp_dados_select['loatiende_'] = $this->loatiende_;
              $this->con_actual_ = $rs->fields[17] ; 
              if (substr($this->con_actual_, 10, 1) == "-") 
              { 
                 $this->con_actual_ = substr($this->con_actual_, 0, 10) . " " . substr($this->con_actual_, 11);
              } 
              if (substr($this->con_actual_, 13, 1) == ".") 
              { 
                 $this->con_actual_ = substr($this->con_actual_, 0, 13) . ":" . substr($this->con_actual_, 14, 2) . ":" . substr($this->con_actual_, 17);
              } 
              $this->nmgp_dados_select['con_actual_'] = $this->con_actual_;
              $this->efec_retencion_ = $rs->fields[18] ; 
              $this->nmgp_dados_select['efec_retencion_'] = $this->efec_retencion_;
              $this->regimen_ = $rs->fields[19] ; 
              $this->nmgp_dados_select['regimen_'] = $this->regimen_;
              $this->tipo_ = $rs->fields[20] ; 
              $this->nmgp_dados_select['tipo_'] = $this->tipo_;
              $this->cliente_ = $rs->fields[21] ; 
              $this->nmgp_dados_select['cliente_'] = $this->cliente_;
              $this->empleado_ = $rs->fields[22] ; 
              $this->nmgp_dados_select['empleado_'] = $this->empleado_;
              $this->proveedor_ = $rs->fields[23] ; 
              $this->nmgp_dados_select['proveedor_'] = $this->proveedor_;
              $this->contacto_ = $rs->fields[24] ; 
              $this->nmgp_dados_select['contacto_'] = $this->contacto_;
              $this->telefonos_prov_ = $rs->fields[25] ; 
              $this->nmgp_dados_select['telefonos_prov_'] = $this->telefonos_prov_;
              $this->email_ = $rs->fields[26] ; 
              $this->nmgp_dados_select['email_'] = $this->email_;
              $this->url_ = $rs->fields[27] ; 
              $this->nmgp_dados_select['url_'] = $this->url_;
              $this->creditoprov_ = $rs->fields[28] ; 
              $this->nmgp_dados_select['creditoprov_'] = $this->creditoprov_;
              $this->dias_ = $rs->fields[29] ; 
              $this->nmgp_dados_select['dias_'] = $this->dias_;
              $this->fechultcomp_ = $rs->fields[30] ; 
              $this->nmgp_dados_select['fechultcomp_'] = $this->fechultcomp_;
              $this->saldoapagar_ = $rs->fields[31] ; 
              $this->nmgp_dados_select['saldoapagar_'] = $this->saldoapagar_;
              $this->autoretenedor_ = $rs->fields[32] ; 
              $this->nmgp_dados_select['autoretenedor_'] = $this->autoretenedor_;
              $this->tipo_documento_ = $rs->fields[33] ; 
              $this->nmgp_dados_select['tipo_documento_'] = $this->tipo_documento_;
              $this->dv_ = $rs->fields[34] ; 
              $this->nmgp_dados_select['dv_'] = $this->dv_;
              $this->nombre1_ = $rs->fields[35] ; 
              $this->nmgp_dados_select['nombre1_'] = $this->nombre1_;
              $this->nombre2_ = $rs->fields[36] ; 
              $this->nmgp_dados_select['nombre2_'] = $this->nombre2_;
              $this->apellido1_ = $rs->fields[37] ; 
              $this->nmgp_dados_select['apellido1_'] = $this->apellido1_;
              $this->apellido2_ = $rs->fields[38] ; 
              $this->nmgp_dados_select['apellido2_'] = $this->apellido2_;
              $this->sucur_cliente_ = $rs->fields[39] ; 
              $this->nmgp_dados_select['sucur_cliente_'] = $this->sucur_cliente_;
              $this->representante_ = $rs->fields[40] ; 
              $this->nmgp_dados_select['representante_'] = $this->representante_;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->imagenter_ = $this->Db->BlobDecode($rs->fields[41]) ; 
              } 
              elseif ($this->Ini->nm_tpbanco == 'pdo_oracle')
              { 
                  $this->imagenter_ = $this->Db->BlobDecode($rs->fields[41]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[41]) && !empty($rs->fields[41]) && is_file($rs->fields[41])) 
                  { 
                     $this->imagenter_ = file_get_contents($rs->fields[41]); 
                  }else 
                  { 
                     $this->imagenter_ = ''; 
                  } 
              } 
              else
              { 
                  $this->imagenter_ = $rs->fields[41] ; 
              } 
              $this->nmgp_dados_select['imagenter_'] = $this->imagenter_;
              $this->es_restaurante_ = $rs->fields[42] ; 
              $this->nmgp_dados_select['es_restaurante_'] = $this->es_restaurante_;
              $this->dias_credito_ = $rs->fields[43] ; 
              $this->nmgp_dados_select['dias_credito_'] = $this->dias_credito_;
              $this->dias_mora_ = $rs->fields[44] ; 
              $this->nmgp_dados_select['dias_mora_'] = $this->dias_mora_;
              $this->cupo_vendedor_ = $rs->fields[45] ; 
              $this->nmgp_dados_select['cupo_vendedor_'] = $this->cupo_vendedor_;
              $this->codigo_ter_ = $rs->fields[46] ; 
              $this->nmgp_dados_select['codigo_ter_'] = $this->codigo_ter_;
              $this->es_cajero_ = $rs->fields[47] ; 
              $this->nmgp_dados_select['es_cajero_'] = $this->es_cajero_;
              $this->autorizado_ = $rs->fields[48] ; 
              $this->nmgp_dados_select['autorizado_'] = $this->autorizado_;
              $this->zona_clientes_ = $rs->fields[49] ; 
              $this->nmgp_dados_select['zona_clientes_'] = $this->zona_clientes_;
              $this->clasificacion_clientes_ = $rs->fields[50] ; 
              $this->nmgp_dados_select['clasificacion_clientes_'] = $this->clasificacion_clientes_;
              $this->creado_ = $rs->fields[51] ; 
              if (substr($this->creado_, 10, 1) == "-") 
              { 
                 $this->creado_ = substr($this->creado_, 0, 10) . " " . substr($this->creado_, 11);
              } 
              if (substr($this->creado_, 13, 1) == ".") 
              { 
                 $this->creado_ = substr($this->creado_, 0, 13) . ":" . substr($this->creado_, 14, 2) . ":" . substr($this->creado_, 17);
              } 
              $this->nmgp_dados_select['creado_'] = $this->creado_;
              $this->disponible_ = $rs->fields[52] ; 
              $this->nmgp_dados_select['disponible_'] = $this->disponible_;
              $this->id_pedido_tmp_ = $rs->fields[53] ; 
              $this->nmgp_dados_select['id_pedido_tmp_'] = $this->id_pedido_tmp_;
              $this->n_pedido_tmp_ = $rs->fields[54] ; 
              $this->nmgp_dados_select['n_pedido_tmp_'] = $this->n_pedido_tmp_;
              $this->total_pedido_tmp_ = $rs->fields[55] ; 
              $this->nmgp_dados_select['total_pedido_tmp_'] = $this->total_pedido_tmp_;
              $this->obs_pedido_tmp_ = $rs->fields[56] ; 
              $this->nmgp_dados_select['obs_pedido_tmp_'] = $this->obs_pedido_tmp_;
              $this->vend_pedido_tmp_ = $rs->fields[57] ; 
              $this->nmgp_dados_select['vend_pedido_tmp_'] = $this->vend_pedido_tmp_;
              $this->ciudad_ = $rs->fields[58] ; 
              $this->nmgp_dados_select['ciudad_'] = $this->ciudad_;
              $this->codigo_postal_ = $rs->fields[59] ; 
              $this->nmgp_dados_select['codigo_postal_'] = $this->codigo_postal_;
              $this->lenguaje_ = $rs->fields[60] ; 
              $this->nmgp_dados_select['lenguaje_'] = $this->lenguaje_;
              $this->nombre_comercil_ = $rs->fields[61] ; 
              $this->nmgp_dados_select['nombre_comercil_'] = $this->nombre_comercil_;
              $this->notificar_ = $rs->fields[62] ; 
              $this->nmgp_dados_select['notificar_'] = $this->notificar_;
              $this->puc_auxiliar_deudores_ = $rs->fields[63] ; 
              $this->nmgp_dados_select['puc_auxiliar_deudores_'] = $this->puc_auxiliar_deudores_;
              $this->puc_retefuente_ventas_ = $rs->fields[64] ; 
              $this->nmgp_dados_select['puc_retefuente_ventas_'] = $this->puc_retefuente_ventas_;
              $this->puc_retefuente_servicios_clie_ = $rs->fields[65] ; 
              $this->nmgp_dados_select['puc_retefuente_servicios_clie_'] = $this->puc_retefuente_servicios_clie_;
              $this->puc_auxiliar_proveedores_ = $rs->fields[66] ; 
              $this->nmgp_dados_select['puc_auxiliar_proveedores_'] = $this->puc_auxiliar_proveedores_;
              $this->puc_retefuente_compras_ = $rs->fields[67] ; 
              $this->nmgp_dados_select['puc_retefuente_compras_'] = $this->puc_retefuente_compras_;
              $this->puc_retefuente_servicios_prov_ = $rs->fields[68] ; 
              $this->nmgp_dados_select['puc_retefuente_servicios_prov_'] = $this->puc_retefuente_servicios_prov_;
              $this->nube_ = $rs->fields[69] ; 
              $this->nmgp_dados_select['nube_'] = $this->nube_;
              $this->latitude_ = $rs->fields[70] ; 
              $this->nmgp_dados_select['latitude_'] = $this->latitude_;
              $this->longitude_ = $rs->fields[71] ; 
              $this->nmgp_dados_select['longitude_'] = $this->longitude_;
              $this->activo_ = $rs->fields[72] ; 
              $this->nmgp_dados_select['activo_'] = $this->activo_;
              $this->es_tecnico_ = $rs->fields[73] ; 
              $this->nmgp_dados_select['es_tecnico_'] = $this->es_tecnico_;
              $this->codigo_tercero_ = $rs->fields[74] ; 
              $this->nmgp_dados_select['codigo_tercero_'] = $this->codigo_tercero_;
              $this->porcentaje_propina_sugerida_ = $rs->fields[75] ; 
              $this->nmgp_dados_select['porcentaje_propina_sugerida_'] = $this->porcentaje_propina_sugerida_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->idtercero_ = (string)$this->idtercero_; 
              $this->saldo_ = (string)$this->saldo_; 
              $this->idmuni_ = (string)$this->idmuni_; 
              $this->cupo_ = (string)$this->cupo_; 
              $this->listaprecios_ = (string)$this->listaprecios_; 
              $this->loatiende_ = (string)$this->loatiende_; 
              $this->dias_ = (string)$this->dias_; 
              $this->saldoapagar_ = (string)$this->saldoapagar_; 
              $this->dv_ = (string)$this->dv_; 
              $this->dias_credito_ = (string)$this->dias_credito_; 
              $this->dias_mora_ = (string)$this->dias_mora_; 
              $this->cupo_vendedor_ = (string)$this->cupo_vendedor_; 
              $this->zona_clientes_ = (string)$this->zona_clientes_; 
              $this->clasificacion_clientes_ = (string)$this->clasificacion_clientes_; 
              $this->id_pedido_tmp_ = (string)$this->id_pedido_tmp_; 
              $this->total_pedido_tmp_ = (string)$this->total_pedido_tmp_; 
              $this->porcentaje_propina_sugerida_ = (string)$this->porcentaje_propina_sugerida_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['parms'] = "idtercero_?#?$this->idtercero_?@?";
              } 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sub_dir'][0]  = "";
              $this->nm_proc_onload_record($sc_seq_vert);
              $this->storeRecordState($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['documento_'] =  $this->documento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombres_'] =  $this->nombres_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cliente_'] =  $this->cliente_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['proveedor_'] =  $this->proveedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_auxiliar_proveedores_'] =  $this->puc_auxiliar_proveedores_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_auxiliar_deudores_'] =  $this->puc_auxiliar_deudores_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['idtercero_'] =  $this->idtercero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['direccion_'] =  $this->direccion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tel_cel_'] =  $this->tel_cel_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nacimiento_'] =  $this->nacimiento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['sexo_'] =  $this->sexo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['urlmail_'] =  $this->urlmail_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['fechault_'] =  $this->fechault_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['saldo_'] =  $this->saldo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['afiliacion_'] =  $this->afiliacion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['idmuni_'] =  $this->idmuni_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['credito_'] =  $this->credito_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cupo_'] =  $this->cupo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['listaprecios_'] =  $this->listaprecios_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['loatiende_'] =  $this->loatiende_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['con_actual_'] =  $this->con_actual_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['con_actual__hora'] =  $this->con_actual__hora; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['efec_retencion_'] =  $this->efec_retencion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['regimen_'] =  $this->regimen_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['contacto_'] =  $this->contacto_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['telefonos_prov_'] =  $this->telefonos_prov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['url_'] =  $this->url_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creditoprov_'] =  $this->creditoprov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_'] =  $this->dias_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['fechultcomp_'] =  $this->fechultcomp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['saldoapagar_'] =  $this->saldoapagar_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['autoretenedor_'] =  $this->autoretenedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dv_'] =  $this->dv_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre1_'] =  $this->nombre1_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre2_'] =  $this->nombre2_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['apellido1_'] =  $this->apellido1_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['apellido2_'] =  $this->apellido2_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['sucur_cliente_'] =  $this->sucur_cliente_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['representante_'] =  $this->representante_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['imagenter_'] =  $this->imagenter_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['imagenter__limpa'] =  $this->imagenter__limpa; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_restaurante_'] =  $this->es_restaurante_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_credito_'] =  $this->dias_credito_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_mora_'] =  $this->dias_mora_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cupo_vendedor_'] =  $this->cupo_vendedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_ter_'] =  $this->codigo_ter_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_cajero_'] =  $this->es_cajero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['autorizado_'] =  $this->autorizado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['zona_clientes_'] =  $this->zona_clientes_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['clasificacion_clientes_'] =  $this->clasificacion_clientes_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creado_'] =  $this->creado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creado__hora'] =  $this->creado__hora; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['disponible_'] =  $this->disponible_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['id_pedido_tmp_'] =  $this->id_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['n_pedido_tmp_'] =  $this->n_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['total_pedido_tmp_'] =  $this->total_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['obs_pedido_tmp_'] =  $this->obs_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['vend_pedido_tmp_'] =  $this->vend_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['ciudad_'] =  $this->ciudad_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_postal_'] =  $this->codigo_postal_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['lenguaje_'] =  $this->lenguaje_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre_comercil_'] =  $this->nombre_comercil_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['notificar_'] =  $this->notificar_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_ventas_'] =  $this->puc_retefuente_ventas_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_servicios_clie_'] =  $this->puc_retefuente_servicios_clie_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_compras_'] =  $this->puc_retefuente_compras_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_servicios_prov_'] =  $this->puc_retefuente_servicios_prov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nube_'] =  $this->nube_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['latitude_'] =  $this->latitude_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['longitude_'] =  $this->longitude_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['activo_'] =  $this->activo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_tecnico_'] =  $this->es_tecnico_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_tercero_'] =  $this->codigo_tercero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['porcentaje_propina_sugerida_'] =  $this->porcentaje_propina_sugerida_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          ksort ($this->form_vert_form_terceros_contable); 
          $rs->Close(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_qtd'] = $sc_seq_vert + $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] - 1;
          if ('total' == $this->form_paginacao)
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $this->sc_max_reg; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $this->sc_max_reg; 
          }
          else
          {
              $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] + 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_qtd']; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total'] + 1; 
          }
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] < (($qt_geral_reg_form_terceros_contable + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['embutida_multi']) 
          { 
          } 
          elseif ($this->Embutida_form) 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->documento_ = "";  
              $this->nombres_ = "";  
              $this->cliente_ = "";  
              $this->empleado_ = "";  
              $this->proveedor_ = "";  
              $this->puc_auxiliar_deudores_ = "";  
              $this->puc_auxiliar_proveedores_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['documento_'] =  $this->documento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombres_'] =  $this->nombres_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cliente_'] =  $this->cliente_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['empleado_'] =  $this->empleado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['proveedor_'] =  $this->proveedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_auxiliar_proveedores_'] =  $this->puc_auxiliar_proveedores_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_auxiliar_deudores_'] =  $this->puc_auxiliar_deudores_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['idtercero_'] =  $this->idtercero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['direccion_'] =  $this->direccion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tel_cel_'] =  $this->tel_cel_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nacimiento_'] =  $this->nacimiento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['sexo_'] =  $this->sexo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['urlmail_'] =  $this->urlmail_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['fechault_'] =  $this->fechault_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['saldo_'] =  $this->saldo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['afiliacion_'] =  $this->afiliacion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['idmuni_'] =  $this->idmuni_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['observaciones_'] =  $this->observaciones_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['credito_'] =  $this->credito_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cupo_'] =  $this->cupo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['listaprecios_'] =  $this->listaprecios_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['loatiende_'] =  $this->loatiende_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['con_actual_'] =  $this->con_actual_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['con_actual__hora'] =  $this->con_actual__hora; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['efec_retencion_'] =  $this->efec_retencion_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['regimen_'] =  $this->regimen_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tipo_'] =  $this->tipo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['contacto_'] =  $this->contacto_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['telefonos_prov_'] =  $this->telefonos_prov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['email_'] =  $this->email_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['url_'] =  $this->url_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creditoprov_'] =  $this->creditoprov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_'] =  $this->dias_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['fechultcomp_'] =  $this->fechultcomp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['saldoapagar_'] =  $this->saldoapagar_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['autoretenedor_'] =  $this->autoretenedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['tipo_documento_'] =  $this->tipo_documento_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dv_'] =  $this->dv_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre1_'] =  $this->nombre1_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre2_'] =  $this->nombre2_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['apellido1_'] =  $this->apellido1_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['apellido2_'] =  $this->apellido2_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['sucur_cliente_'] =  $this->sucur_cliente_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['representante_'] =  $this->representante_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['imagenter_'] =  $this->imagenter_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['imagenter__limpa'] =  $this->imagenter__limpa; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_restaurante_'] =  $this->es_restaurante_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_credito_'] =  $this->dias_credito_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['dias_mora_'] =  $this->dias_mora_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['cupo_vendedor_'] =  $this->cupo_vendedor_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_ter_'] =  $this->codigo_ter_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_cajero_'] =  $this->es_cajero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['autorizado_'] =  $this->autorizado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['zona_clientes_'] =  $this->zona_clientes_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['clasificacion_clientes_'] =  $this->clasificacion_clientes_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creado_'] =  $this->creado_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['creado__hora'] =  $this->creado__hora; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['disponible_'] =  $this->disponible_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['id_pedido_tmp_'] =  $this->id_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['n_pedido_tmp_'] =  $this->n_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['total_pedido_tmp_'] =  $this->total_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['obs_pedido_tmp_'] =  $this->obs_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['vend_pedido_tmp_'] =  $this->vend_pedido_tmp_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['ciudad_'] =  $this->ciudad_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_postal_'] =  $this->codigo_postal_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['lenguaje_'] =  $this->lenguaje_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nombre_comercil_'] =  $this->nombre_comercil_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['notificar_'] =  $this->notificar_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_ventas_'] =  $this->puc_retefuente_ventas_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_servicios_clie_'] =  $this->puc_retefuente_servicios_clie_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_compras_'] =  $this->puc_retefuente_compras_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['puc_retefuente_servicios_prov_'] =  $this->puc_retefuente_servicios_prov_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['nube_'] =  $this->nube_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['latitude_'] =  $this->latitude_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['longitude_'] =  $this->longitude_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['activo_'] =  $this->activo_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['es_tecnico_'] =  $this->es_tecnico_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['codigo_tercero_'] =  $this->codigo_tercero_; 
             $this->form_vert_form_terceros_contable[$sc_seq_vert]['porcentaje_propina_sugerida_'] =  $this->porcentaje_propina_sugerida_; 
              $sc_seq_vert++; 
          } 
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['record_state'][$sc_seq_vert]['buttons']['update'];
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_terceros_contable_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("documento_", "nombres_"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("documento_", "nombres_"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['csrf_token'];
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

   function Form_lookup_puc_auxiliar_proveedores_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre)  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_proveedores_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_puc_auxiliar_deudores_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'] = array(); 
    }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT codigo, concat(codigo,' - ', nombre)  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT codigo, codigo&' - '&nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT codigo, codigo + ' - ' + nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   else
   {
       $nm_comando = "SELECT codigo, codigo||' - '||nombre  FROM plancuentas  ORDER BY codigo, nombre";
   }
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['Lookup_puc_auxiliar_deudores_'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_terceros_contable_pack_ajax_response();
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
          if ($field == "SC_all_Cmp" || $field == "documento_") 
          {
              $this->SC_monta_condicao($comando, "documento", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp" || $field == "nombres_") 
          {
              $this->SC_monta_condicao($comando, "nombres", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_terceros_contable = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['total'] = $qt_geral_reg_form_terceros_contable;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_terceros_contable_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_terceros_contable_pack_ajax_response();
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
      $nm_numeric[] = "idtercero";$nm_numeric[] = "saldo";$nm_numeric[] = "idmuni";$nm_numeric[] = "cupo";$nm_numeric[] = "listaprecios";$nm_numeric[] = "loatiende";$nm_numeric[] = "dias";$nm_numeric[] = "saldoapagar";$nm_numeric[] = "dv";$nm_numeric[] = "dias_credito";$nm_numeric[] = "dias_mora";$nm_numeric[] = "cupo_vendedor";$nm_numeric[] = "zona_clientes";$nm_numeric[] = "clasificacion_clientes";$nm_numeric[] = "id_pedido_tmp";$nm_numeric[] = "total_pedido_tmp";$nm_numeric[] = "porcentaje_propina_sugerida";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['decimal_db'] == ".")
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
      $Nm_datas['nacimiento'] = "date";$Nm_datas['fechault'] = "date";$Nm_datas['afiliacion'] = "date";$Nm_datas['con_actual'] = "timestamp";$Nm_datas['fechultcomp'] = "date";$Nm_datas['creado'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_terceros_contable_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_terceros_contable_fim.php";
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
       form_terceros_contable_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/grp__NM__ico__NM__favicon.ico">
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_terceros_contable']['masterValue']);
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
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "balterarsel":
                return array("sc_b_upd_t.sc-unique-btn-1");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-2");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-3");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-4");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-5");
                break;
            case "exit":
                return array("sc_b_sai_b.sc-unique-btn-6");
                break;
        }

        return array($buttonName);
    } // getButtonIds

}
?>
